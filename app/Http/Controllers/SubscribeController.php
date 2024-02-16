<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscribeCollection;
use App\Models\Subscribe;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;


class SubscribeController extends Controller
{
    // Web Method
    public function index()
    {
        $subscribers = Subscribe::orderBy('created_at', 'desc')->paginate(9);
        return view('subscribers.index', [
            'subscribers' => $subscribers,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes',
        ]);
        Subscribe::create($request->all());
        session()->flash('status', 'You are subscribed');
        return back();
    }
    public function update(Subscribe $subscribe)
    {
        $attr = request()->validate([
            'email' => 'required|unique:subscribes,email,' . $subscribe->id,
        ]);
        $subscribe->update($attr);
        session()->flash('status', 'The subscriber was updated');
        return redirect()->to(route('subscribe.index'));
    }
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        session()->flash('status', 'The subscriber was deleted');
        return redirect()->to(route('subscribe.index'));
    }

    // API Method
    public function counter()
    {
        $subscriberCount = Subscribe::count();
        return ($subscriberCount);
    }
    public $loadDefault = 10;
    public function data(Request $request)
    {
        $request->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:id,email,created_at'],
        ]);
        $query = Subscribe::query();
        if ($request->q) {
            $query->where('email', 'like', '%' . $request->q . '%');
        }
        if ($request->has(['field', 'direction'])) {
            $query->orderBy($request->field, $request->direction);
        }
        $subscriber = new SubscribeCollection($query->paginate($request->load));
        return ($subscriber);
    }
    public function input(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscribe::create($attr);
        return response()->json([
            'message' => "You're subscribed"
        ]);
    }
    public function updateApi(Request $request, Subscribe $subscriber)
    {
        // $this->authorize('if_moderator');
        $attr = $request->validate([
            'email' => 'required|unique:subscribers,email,' . $subscriber->id,
        ]);

        $subscriber->update($attr);
        return response()->json([
            'message' => "Subscriber updated"
        ]);
    }
    public function destroyApi(Subscribe $subscriber)
    {
        $subscriber->delete();

        return response()->json([
            'message' => 'Subscriber soft deleted'
        ]);
    }
    //send email to each subs
    public function storeSingleEmail(Request $request, $id)
    {
        $subscriber = Subscribe::find($id);
        $details = array();
        $details['greeting'] = $request->greeting;
        $details['content'] = strip_tags($request->content);
        $details['actiontext'] = $request->actiontext;
        $details['actionurl'] = $request->actionurl;
        $details['endtext'] = $request->endtext;
        // dd($details['content']);
        Notification::send($subscriber, new SendEmailNotification($details));

        return redirect()->to('/admin/subscribers');
    }


    public function storeAllUserEmail(Request $request)
    {
        $subscribers = Subscribe::all();

        $details = array();

        $details['greeting'] = $request->greeting;
        $details['content'] = strip_tags($request->content);
        $details['actiontext'] = $request->actiontext;
        $details['actionurl'] = $request->actionurl;
        $details['endtext'] = $request->endtext;

        foreach ($subscribers as $subscriber) {
            Notification::send($subscriber, new SendEmailNotification($details));
        }
        return redirect()->to('/admin/subscribers');
    }
}
