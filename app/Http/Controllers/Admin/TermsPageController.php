<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsPage;
use Illuminate\Http\Request;

class TermsPageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SECTION TITLES
    |--------------------------------------------------------------------------
    */

    private function getTitle($section)
    {
        return match ((int) $section) {
            1 => 'Banner',
            2 => 'Acceptance of Terms',
            3 => 'Use of the Website',
            4 => 'Intellectual Property',
            5 => 'Disclaimer',
            6 => 'Limitation of Liability',
            7 => 'External Links',
            8 => 'Changes to These Terms',
            9 => 'Governing Law',
            10 => 'CTA Banner (Bottom)',
            default => 'Terms of Use',
        };
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATE SECTION
    |--------------------------------------------------------------------------
    */

    private function validateSection($section, $is_card)
    {
        /*
        |--------------------------------------------------------------------------
        | Allowed Sections
        |--------------------------------------------------------------------------
        */

        $allowedSections = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
        ];

        abort_unless(
            in_array((string) $section, $allowedSections, true),
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Allowed Card Values
        |--------------------------------------------------------------------------
        */

        abort_unless(
            in_array((string) $is_card, ['0', '1'], true),
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Only Section 3 Supports Cards
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '1') {
            abort_unless(
                (string) $section === '3',
                404
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | FIND PAGE BY ID
    |--------------------------------------------------------------------------
    |
    | Used for cards and existing records where the actual database ID
    | is known.
    |
    */

    private function getPage($id, $section, $is_card)
    {
        return TermsPage::query()
            ->where('id', $id)
            ->where('section', (int) $section)
            ->where('is_card', (int) $is_card)
            ->first();
    }


    /*
    |--------------------------------------------------------------------------
    | FIND SINGLE CONTENT BY SECTION
    |--------------------------------------------------------------------------
    |
    | Used for normal Terms sections.
    |
    | Example:
    |
    | section = 1
    | is_card = 0
    |
    | section = 2
    | is_card = 0
    |
    | etc.
    |
    */

    private function getSectionPage($section)
    {
        return TermsPage::query()
            ->where('section', (int) $section)
            ->where('is_card', 0)
            ->first();
    }


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    |
    | Only Section 3 Cards use the index page.
    |
    */

    public function index(Request $request, $section, $is_card)
    {
        $this->validateSection($section, $is_card);

        /*
        |--------------------------------------------------------------------------
        | Index is only for cards
        |--------------------------------------------------------------------------
        */

        abort_unless(
            (string) $is_card === '1',
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Page Title
        |--------------------------------------------------------------------------
        */

        $title = $this->getTitle($section) . ' Cards';


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        $search = $request->input('search', '');


        /*
        |--------------------------------------------------------------------------
        | Get Cards
        |--------------------------------------------------------------------------
        */

        $collections = TermsPage::query()
            ->where('section', (int) $section)
            ->where('is_card', 1)

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'title',
                        'like',
                        '%' . $search . '%'
                    )

                        ->orWhere(
                            'description',
                            'like',
                            '%' . $search . '%'
                        );
                });
            })

            ->orderBy('display_order')
            ->orderBy('id')

            ->paginate(20)

            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.terms-page.index',
            compact(
                'section',
                'is_card',
                'title',
                'collections',
                'search'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    |
    | Normal content:
    | section 1-10
    | is_card = 0
    |
    | Cards:
    | section 3
    | is_card = 1
    |
    */

    public function create($section, $is_card)
    {
        $this->validateSection($section, $is_card);


        /*
        |--------------------------------------------------------------------------
        | Normal Content
        |--------------------------------------------------------------------------
        |
        | Only one record should exist for each section.
        |
        */

        if ((string) $is_card === '0') {

            $existingPage = $this->getSectionPage($section);


            /*
            |--------------------------------------------------------------------------
            | Already Exists
            |--------------------------------------------------------------------------
            |
            | If content already exists, don't create another one.
            | Open the existing edit page.
            |
            */

            if ($existingPage) {

                return redirect()->route(
                    'admin.terms-page.edit',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                        'termsPage' => $existingPage->id,
                    ]
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Form Title
        |--------------------------------------------------------------------------
        */

        $title = 'Add ' . $this->getTitle($section);


        if ((string) $is_card === '1') {
            $title .= ' Card';
        }


        /*
        |--------------------------------------------------------------------------
        | New Model
        |--------------------------------------------------------------------------
        */

        $termsPage = new TermsPage();

        $termsPage->section = (int) $section;

        $termsPage->is_card = (int) $is_card;

        $termsPage->display_order = 0;

        $termsPage->published = false;


        /*
        |--------------------------------------------------------------------------
        | Return Form
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.terms-page.form',
            compact(
                'section',
                'is_card',
                'title',
                'termsPage'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(
        Request $request,
        $section,
        $is_card
    ) {
        $this->validateSection($section, $is_card);


        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Normal Content
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '0') {

            $existingPage = $this->getSectionPage($section);


            if ($existingPage) {

                return redirect()->route(
                    'admin.terms-page.edit',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                        'termsPage' => $existingPage->id,
                    ]
                )->with(
                    'info',
                    'This section already has content.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'intro' => [
                'nullable',
                'string',
            ],

            'label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'additional_description' => [
                'nullable',
                'string',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'serving' => [
                'nullable',
                'string',
                'max:255',
            ],

            'primary_focus' => [
                'nullable',
                'string',
            ],

            'key_offerings' => [
                'nullable',
                'string',
            ],

            'key_points' => [
                'nullable',
                'string',
            ],

            'quote' => [
                'nullable',
                'string',
            ],

            'quote_author' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url' => [
                'nullable',
                'string',
                'max:255',
            ],


            'contact_question' => [
                'nullable',
                'string',
                'max:255',
            ],

            'contact_email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'contact_address' => [
                'nullable',
                'string',
            ],

            'effective_date' => [
                'nullable',
                'string',
                'max:255',
            ],

            'operator' => [
                'nullable',
                'string',
                'max:255',
            ],

            'governing_law' => [
                'nullable',
                'string',
            ],

            'button_text_2' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url_2' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_text_3' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url_3' => [
                'nullable',
                'string',
                'max:255',
            ],

            'footer_text' => [
                'nullable',
                'string',
            ],

            'menu_items' => [
                'nullable',
                'array',
            ],

            'menu_items.*.label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'menu_items.*.url' => [
                'nullable',
                'string',
                'max:255',
            ],

            'menu_items.*.active' => [
                'nullable',
                'boolean',
            ],


            'published' => [
                'nullable',
                'boolean',
            ],

            'display_order' => [
                (string) $is_card === '1'
                    ? 'required'
                    : 'nullable',

                'integer',
                'min:0',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Set Section
        |--------------------------------------------------------------------------
        */

        $validated['section'] = (int) $section;

        $validated['is_card'] = (int) $is_card;

        $validated['published'] = $request->boolean(
            'published'
        );


        /*
        |--------------------------------------------------------------------------
        | Normal Content Display Order
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '0') {
            $validated['display_order'] = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | Create Record
        |--------------------------------------------------------------------------
        */

        $termsPage = TermsPage::create(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | Cards
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '1') {

            return redirect()->route(
                'admin.terms-page.index',
                [
                    'section' => $section,
                    'is_card' => $is_card,
                ]
            )->with(
                'success',
                'Content added successfully.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Normal Content
        |--------------------------------------------------------------------------
        */

        return redirect()->route(
            'admin.terms-page.edit',
            [
                'section' => $section,
                'is_card' => $is_card,
                'termsPage' => $termsPage->id,
            ]
        )->with(
            'success',
            'Content added successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(
        $section,
        $is_card,
        $termsPage
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Find Record
        |--------------------------------------------------------------------------
        */

        $page = $this->getPage(
            $termsPage,
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | If Not Found
        |--------------------------------------------------------------------------
        |
        | For normal content, open Create instead of 404.
        |
        */

        if (!$page) {

            if ((string) $is_card === '0') {

                return redirect()->route(
                    'admin.terms-page.create',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                    ]
                );
            }

            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Redirect To Edit
        |--------------------------------------------------------------------------
        */

        return redirect()->route(
            'admin.terms-page.edit',
            [
                'section' => $section,
                'is_card' => $is_card,
                'termsPage' => $page->id,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    |
    | For normal content, we search by SECTION.
    | We do NOT trust the ID coming from the sidebar.
    |
    */

    public function edit(
        $section,
        $is_card,
        $termsPage
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Normal Content
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | Sidebar sends:
        | /terms-page/4/0/4/edit
        |
        | But database might actually contain:
        | id = 15
        | section = 4
        | is_card = 0
        |
        | We find ID 15 using section 4.
        |
        */

        if ((string) $is_card === '0') {

            $page = $this->getSectionPage(
                $section
            );


            /*
            |--------------------------------------------------------------------------
            | No Record
            |--------------------------------------------------------------------------
            |
            | Instead of 404:
            | Open Create page.
            |
            */

            if (!$page) {

                return redirect()->route(
                    'admin.terms-page.create',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                    ]
                );
            }
        } else {

            /*
            |--------------------------------------------------------------------------
            | Cards
            |--------------------------------------------------------------------------
            |
            | Cards use the actual database ID.
            |
            */

            $page = $this->getPage(
                $termsPage,
                $section,
                $is_card
            );


            /*
            |--------------------------------------------------------------------------
            | Card Does Not Exist
            |--------------------------------------------------------------------------
            */

            if (!$page) {
                abort(404);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        */

        $cardOrIntro = (string) $is_card === '1'
            ? 'Card'
            : 'Content';


        $title = 'Edit '
            . $this->getTitle($section)
            . ' '
            . $cardOrIntro;


        /*
        |--------------------------------------------------------------------------
        | Return Form
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.terms-page.form',
            [
                'section' => $section,
                'is_card' => $is_card,
                'title' => $title,
                'termsPage' => $page,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $section,
        $is_card,
        $termsPage
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Find Existing Record
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '0') {

            /*
            |--------------------------------------------------------------------------
            | Normal Content
            |--------------------------------------------------------------------------
            |
            | Find by section instead of trusting the ID.
            |
            */

            $page = $this->getSectionPage(
                $section
            );
        } else {

            /*
            |--------------------------------------------------------------------------
            | Cards
            |--------------------------------------------------------------------------
            */

            $page = $this->getPage(
                $termsPage,
                $section,
                $is_card
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Record Not Found
        |--------------------------------------------------------------------------
        */

        if (!$page) {

            if ((string) $is_card === '0') {

                return redirect()->route(
                    'admin.terms-page.create',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                    ]
                )->with(
                    'error',
                    'Content does not exist yet. Please create it first.'
                );
            }

            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'intro' => [
                'nullable',
                'string',
            ],

            'label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'additional_description' => [
                'nullable',
                'string',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'serving' => [
                'nullable',
                'string',
                'max:255',
            ],

            'primary_focus' => [
                'nullable',
                'string',
            ],

            'key_offerings' => [
                'nullable',
                'string',
            ],

            'key_points' => [
                'nullable',
                'string',
            ],

            'quote' => [
                'nullable',
                'string',
            ],

            'quote_author' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url' => [
                'nullable',
                'string',
                'max:255',
            ],


            'contact_question' => [
                'nullable',
                'string',
                'max:255',
            ],

            'contact_email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'contact_address' => [
                'nullable',
                'string',
            ],

            'effective_date' => [
                'nullable',
                'string',
                'max:255',
            ],

            'operator' => [
                'nullable',
                'string',
                'max:255',
            ],

            'governing_law' => [
                'nullable',
                'string',
            ],

            'button_text_2' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url_2' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_text_3' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url_3' => [
                'nullable',
                'string',
                'max:255',
            ],

            'footer_text' => [
                'nullable',
                'string',
            ],

            'menu_items' => [
                'nullable',
                'array',
            ],

            'menu_items.*.label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'menu_items.*.url' => [
                'nullable',
                'string',
                'max:255',
            ],

            'menu_items.*.active' => [
                'nullable',
                'boolean',
            ],

            'published' => [
                'nullable',
                'boolean',
            ],

            'display_order' => [
                (string) $is_card === '1'
                    ? 'required'
                    : 'nullable',

                'integer',
                'min:0',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Set Values
        |--------------------------------------------------------------------------
        */

        $validated['section'] = (int) $section;

        $validated['is_card'] = (int) $is_card;

        $validated['published'] = $request->boolean(
            'published'
        );


        /*
        |--------------------------------------------------------------------------
        | Normal Content
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '0') {
            $validated['display_order'] = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $page->update(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | Cards
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '1') {

            return redirect()->route(
                'admin.terms-page.index',
                [
                    'section' => $section,
                    'is_card' => $is_card,
                ]
            )->with(
                'success',
                'Content updated successfully.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Normal Content
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'success',
            'Content updated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    |
    | Only cards can be deleted.
    |
    */

    public function destroy(
        $section,
        $is_card,
        $termsPage
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Only Cards Can Be Deleted
        |--------------------------------------------------------------------------
        */

        abort_unless(
            (string) $is_card === '1',
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Find Card
        |--------------------------------------------------------------------------
        */

        $page = $this->getPage(
            $termsPage,
            $section,
            $is_card
        );


        if (!$page) {
            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete
        |--------------------------------------------------------------------------
        */

        $page->delete();


        return back()->with(
            'success',
            'Content deleted successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | TOGGLE PUBLISH
    |--------------------------------------------------------------------------
    */

    public function togglePublish(
        $section,
        $is_card,
        $termsPage
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Find Record
        |--------------------------------------------------------------------------
        */

        $page = $this->getPage(
            $termsPage,
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Record Not Found
        |--------------------------------------------------------------------------
        */

        if (!$page) {

            if ((string) $is_card === '0') {

                return redirect()->route(
                    'admin.terms-page.create',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                    ]
                );
            }

            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Toggle
        |--------------------------------------------------------------------------
        */

        $page->update([
            'published' => !$page->published,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Message
        |--------------------------------------------------------------------------
        */

        $message = $page->published
            ? 'Content published successfully.'
            : 'Content unpublished successfully.';


        return back()->with(
            'success',
            $message
        );
    }
}
