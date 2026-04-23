<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 3); // Default is 5 rows per page
        $contacts = Contact::orderBy('id', 'desc')->paginate($perPage);
        return view('admin.contacts', compact('contacts', 'perPage'));
    }



    public function delete($id)
    {
        Contact::where('id', (int) $id)->forceDelete();
        return redirect()->back()->with('success', "Enquiry Deleted");
    }

    public function bulkDelete(Request $request)
    {
        if ($request->has('ids') && is_array($request->ids)) {
            $ids = array_map('intval', $request->ids);
            Contact::whereIn('id', $ids)->forceDelete();
            return redirect()->back()->with('success', "Selected Enquiries Deleted");
        } else {
            Contact::where('id', $request->ids)->forceDelete();
            return redirect()->back()->with('success', "Enquiry Deleted");
        }
        return redirect()->back()->with('error', "No Enquiries Selected for Deletion");
    }






    // ✅ Export CSV
    public function export()
    {
        $fileName = 'leads.csv';

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
        ];

        $contacts = Contact::all();

        $callback = function () use ($contacts) {
            $file = fopen('php://output', 'w');

            // CSV Header
            fputcsv($file, ['Name', 'Email', 'Team', 'Service', 'Package', 'Message']);

            foreach ($contacts as $row) {
                fputcsv($file, [
                    $row->name,
                    $row->email,
                    $row->team,
                    $row->service,
                    $row->package,
                    $row->message
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
