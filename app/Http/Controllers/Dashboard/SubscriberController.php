<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use DataTables;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;



class SubscriberController extends Controller
{
    public function index()
    {
        return view('dashboard.subscribers.index');
    }
    //Send email
    // public function emailView($id)
    // {
    //     $data = Subscriber::find($id);
    //     return view('subscribers.sendemail', compact('data'));
    // }

    public function getSubscribersDatatable()
    {
        $subscribers = Subscriber::select('*');

        return Datatables::of($subscribers)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<button class="delete-btn btn btn-danger btn-sm" data-id="' . $row->id . '" data-toggle="modal" data-target="#deleteModal">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function delete(Request $request)
    {
        $subscriber = Subscriber::find($request->id);
        if ($subscriber) {
            $subscriber->delete();
            return response()->json(['success' => 'Subscriber deleted successfully.']);
        }
        return response()->json(['error' => 'Subscriber not found.'], 404);
    }


    public function edit($id)
    {
        // Fetch the subscriber with the given ID and return the edit view
        $subscriber = Subscriber::findOrFail($id);
        return view('dashboard.subscribers.edit', compact('subscriber'));
    }

    /**
     * Show the form for sending emails to subscribers.
     *
     * @return \Illuminate\View\View
     */
    public function showSendEmailForm($id)
    {
        // dd('ok');
        $data = Subscriber::find($id);
        return view('dashboard.subscribers.sendemail', compact('data'));
    }
    public function showSendEmailFormAll()
    {
        // dd('ok');

        return view('dashboard.subscribers.sendemailAll');
    }

    //send email to each subs
    public function storeSingleEmail(Request $request, $id)
    {
        $subscriber = Subscriber::find($id);
        $details = array();
        $details['greeting'] = $request->greeting;
        $details['body'] = $request->body;
        $details['actiontext'] = $request->actiontext;
        $details['actionurl'] = $request->actionurl;
        $details['endtext'] = $request->endtext;

        Notification::send($subscriber, new SendEmailNotification($details));

        return redirect()->to('/dashboard/subscribers');
    }


    public function storeAllUserEmail(Request $request)
    {
        $subscribers = Subscriber::all();

        $details = array();

        $details['greeting'] = $request->greeting;
        $details['body'] = $request->body;
        $details['actiontext'] = $request->actiontext;
        $details['actionurl'] = $request->actionurl;
        $details['endtext'] = $request->endtext;

        foreach ($subscribers as $subscriber) {
            Notification::send($subscriber, new SendEmailNotification($details));
        }
        return redirect()->to('/dashboard/subscribers');
    }
}
