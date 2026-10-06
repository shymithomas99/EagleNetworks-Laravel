<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicyPage;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
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
            2 => 'Privacy Policy',
            3 => 'Data We Collect',
            4 => 'We Use Your Data',
            5 => 'Legal Basis for Processing',
            6 => 'Data Sharing',
            7 => 'Data Retention',
            8 => 'Your Rights',
            9 => 'Cookies',
            10 => 'Contact Details',
            11 => 'CTA Banner (Bottom)',
            default => 'Privacy Policy',
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
            '11',
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
        | Card Sections
        |--------------------------------------------------------------------------
        |
        | 3 = Data We Collect
        | 5 = Legal Basis for Processing
        | 8 = Your Rights
        | 9 = Cookies
        |
        */

        $cardSections = [
            '3',
            '5',
            '8',
            '9',
        ];


        /*
        |--------------------------------------------------------------------------
        | If is_card = 1, section must support cards
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '1') {

            abort_unless(
                in_array(
                    (string) $section,
                    $cardSections,
                    true
                ),
                404
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | FIND PAGE BY ID
    |--------------------------------------------------------------------------
    |
    | Used for cards and existing records.
    |
    */

    private function getPage($id, $section, $is_card)
    {
        return PrivacyPolicyPage::query()
            ->where('id', $id)
            ->where('section', (int) $section)
            ->where('is_card', (int) $is_card)
            ->first();
    }


    /*
    |--------------------------------------------------------------------------
    | FIND NORMAL CONTENT BY SECTION
    |--------------------------------------------------------------------------
    |
    | We do NOT depend on database ID matching section number.
    |
    */

    private function getSectionPage($section)
    {
        return PrivacyPolicyPage::query()
            ->where('section', (int) $section)
            ->where('is_card', 0)
            ->first();
    }


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    |
    | Used for card sections.
    |
    */

    public function index(
        Request $request,
        $section,
        $is_card
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


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
        | Title
        |--------------------------------------------------------------------------
        */

        $title = $this->getTitle($section) . ' Cards';


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        $search = $request->input(
            'search',
            ''
        );


        /*
        |--------------------------------------------------------------------------
        | Get Cards
        |--------------------------------------------------------------------------
        */

        $collections = PrivacyPolicyPage::query()
            ->where(
                'section',
                (int) $section
            )
            ->where(
                'is_card',
                1
            )

            ->when(
                $search,
                function ($query) use ($search) {

                    $query->where(
                        function ($q) use ($search) {

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
                        }
                    );
                }
            )

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
            'admin.privacy-policy.index',
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
    */

    public function create(
        $section,
        $is_card
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
        | Only one normal content record per section.
        |
        */

        if ((string) $is_card === '0') {

            $existingPage = $this->getSectionPage(
                $section
            );


            /*
            |--------------------------------------------------------------------------
            | Already Exists
            |--------------------------------------------------------------------------
            */

            if ($existingPage) {

                return redirect()->route(
                    'admin.privacy-policy.edit',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                        'privacyPolicy' => $existingPage->id,
                    ]
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        */

        $title = 'Add '
            . $this->getTitle($section);


        if ((string) $is_card === '1') {
            $title .= ' Card';
        }


        /*
        |--------------------------------------------------------------------------
        | New Model
        |--------------------------------------------------------------------------
        */

        $privacyPolicy = new PrivacyPolicyPage();

        $privacyPolicy->section = (int) $section;

        $privacyPolicy->is_card = (int) $is_card;

        $privacyPolicy->display_order = 0;

        $privacyPolicy->published = false;


        /*
        |--------------------------------------------------------------------------
        | Return Form
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.privacy-policy.form',
            compact(
                'section',
                'is_card',
                'title',
                'privacyPolicy'
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
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Normal Content
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '0') {

            $existingPage = $this->getSectionPage(
                $section
            );


            if ($existingPage) {

                return redirect()->route(
                    'admin.privacy-policy.edit',
                    [
                        'section' => $section,
                        'is_card' => $is_card,
                        'privacyPolicy' => $existingPage->id,
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

            'meta_description' => [
                'nullable',
                'string',
            ],

            'content_blocks' => [
                'nullable',
                'array',
            ],

            'content_blocks.*.title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'content_blocks.*.description' => [
                'nullable',
                'string',
            ],

            'effective_date' => [
                'nullable',
                'string',
                'max:255',
            ],

            'data_controller' => [
                'nullable',
                'string',
                'max:255',
            ],

            'regulatory_framework' => [
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
        | Create
        |--------------------------------------------------------------------------
        */

        $privacyPolicy = PrivacyPolicyPage::create(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | Cards
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '1') {

            return redirect()->route(
                'admin.privacy-policy.index',
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
            'admin.privacy-policy.edit',
            [
                'section' => $section,
                'is_card' => $is_card,
                'privacyPolicy' => $privacyPolicy->id,
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
        $privacyPolicy
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
            $privacyPolicy,
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | If Normal Content Doesn't Exist
        |--------------------------------------------------------------------------
        */

        if (!$page) {

            if ((string) $is_card === '0') {

                return redirect()->route(
                    'admin.privacy-policy.create',
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
            'admin.privacy-policy.edit',
            [
                'section' => $section,
                'is_card' => $is_card,
                'privacyPolicy' => $page->id,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    |
    | Normal content is found by section.
    | Sidebar database IDs are NOT trusted.
    |
    */

    public function edit(
        $section,
        $is_card,
        $privacyPolicy
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Normal Content
        |--------------------------------------------------------------------------
        */

        if ((string) $is_card === '0') {

            $page = $this->getSectionPage(
                $section
            );


            /*
            |--------------------------------------------------------------------------
            | No Record → Create
            |--------------------------------------------------------------------------
            */

            if (!$page) {

                return redirect()->route(
                    'admin.privacy-policy.create',
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
            */

            $page = $this->getPage(
                $privacyPolicy,
                $section,
                $is_card
            );


            /*
            |--------------------------------------------------------------------------
            | Card Not Found
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
            'admin.privacy-policy.form',
            [
                'section' => $section,
                'is_card' => $is_card,
                'title' => $title,
                'privacyPolicy' => $page,
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
        $privacyPolicy
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

        if ((string) $is_card === '0') {

            /*
            |--------------------------------------------------------------------------
            | Normal Content → Find By Section
            |--------------------------------------------------------------------------
            */

            $page = $this->getSectionPage(
                $section
            );
        } else {

            /*
            |--------------------------------------------------------------------------
            | Cards → Find By ID
            |--------------------------------------------------------------------------
            */

            $page = $this->getPage(
                $privacyPolicy,
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
                    'admin.privacy-policy.create',
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

            'meta_description' => [
                'nullable',
                'string',
            ],

            'content_blocks' => [
                'nullable',
                'array',
            ],

            'content_blocks.*.title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'content_blocks.*.description' => [
                'nullable',
                'string',
            ],

            'effective_date' => [
                'nullable',
                'string',
                'max:255',
            ],

            'data_controller' => [
                'nullable',
                'string',
                'max:255',
            ],

            'regulatory_framework' => [
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
                'admin.privacy-policy.index',
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
        $privacyPolicy
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Only Cards
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
            $privacyPolicy,
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
        $privacyPolicy
    ) {
        $this->validateSection(
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Find Card
        |--------------------------------------------------------------------------
        */

        $page = $this->getPage(
            $privacyPolicy,
            $section,
            $is_card
        );


        /*
        |--------------------------------------------------------------------------
        | Not Found
        |--------------------------------------------------------------------------
        */

        if (!$page) {

            if ((string) $is_card === '0') {

                return redirect()->route(
                    'admin.privacy-policy.create',
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
