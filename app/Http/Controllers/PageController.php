<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Page;
use App\Image;
use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function create()
    {
    	return view('admin.create.page');
    }

    public function postEditPage(Request $request)
    {

        if($request->input('oldurl') != $request->input('url'))
        {
            $this->validate($request, [
                'url' => 'required|unique:pages|max:255',
                'name' => 'required',
                'metaDescription' => 'required',
                'content' => 'required'
            ]);
        }else{
            $this->validate($request, [
                'url' => 'required|max:255',
                'name' => 'required',
                'metaDescription' => 'required',
                'content' => 'required'
            ]);
        }

        $page = Page::findOrFail($request->input('id'));
        $page->name = $request->input('name');
        $page->url = strtolower(str_replace(" ", "-", $request->input('url')));
        $page->metaDescription = $request->input('metaDescription');
        $page->content = $request->input('content');
        $page->save();

        if($request->input('newsletter') == 2)
        {
            $this->sendEmail($request->input('content'));
        }

        return redirect('/admin/listPages')->with('success', 'Page Edited!');
    }

    public function postPage(Request $request)
	{
	    $this->validate($request, [
	        'url' => 'required|unique:pages|max:255',
	        'name' => 'required',
	        'metaDescription' => 'required',
	        'content' => 'required'
	    ]);

        $page = new Page;
        $page->name = $request->input('name');
        $page->url = strtolower(str_replace(" ", "-", $request->input('url')));
        $page->metaDescription = $request->input('metaDescription');
        $page->content = $request->input('content');
        $page->save();

        if($request->input('newsletter') == 2)
        {
            $this->sendEmail($request->input('content'));
        }

	    return redirect('/admin/listPages')->with('success', 'Page Created!');
    }

    public function listPages()
    {
    	return view('admin.list.pages',
            ['pages' => Page::all()],
            ['trashed' => Page::onlyTrashed()->get()]);
    }

    public function deletePage($id)
    {
        Page::findOrFail($id)->delete();
        return redirect('/admin/listPages')->with('success', 'Page Deleted!');
    }

    public function undeletePage($id)
    {
        Page::withTrashed()
        ->where('id', $id)
        ->restore();
        return redirect('/admin/listPages')->with('success', 'Page Restored!');
    }

    public function editPage($id)
    {
        return view('admin.edit.page',
            ['page' => Page::findOrFail($id)]);
    }

    public function deactivatePage($id)
    {
        $page = Page::findOrFail($id);
        $page->live = "N";
        $page->save();
        return redirect('/admin/listPages')->with('success', 'Page Deactivated!');
    }

    public function activatePage($id)
    {
        $page = Page::findOrFail($id);
        $page->live = "Y";
        $page->save();
        return redirect('/admin/listPages')->with('success', 'Page Activated!');
    }

    public function hidePage($id)
    {
        $page = Page::findOrFail($id);
        $page->hidden = "Y";
        $page->save();
        return redirect('/admin/listPages')->with('success', 'Page Hidden!');
    }

    public function unhidePage($id)
    {
        $page = Page::findOrFail($id);
        $page->hidden = "N";
        $page->save();
        return redirect('/admin/listPages')->with('success', 'Page Unhidden!');
    }

    public function displayPage($url)
    {
        return view('site.cmsPage', [
            'pageData' => Page::where('url','=',$url)->where('live', '=', 'Y')->first(),
            'backgroundImages' => Image::where('imageType', "=", "background")->get()]);
    }

    public function sendEmail($content)
    {
        $users = Contact::where("newsletter", "=", "Y");
        $contentPage = array('content' => $content);
        foreach($users as $user)
        {
            Mail::send('emails.admin.newsltter', ['user' => $user, 'content' => $contentPage], function ($m) use ($user) {
                $m->from('sales@thamesbrokerage.co.uk', 'Craig @ Thames Brokerage');
                $m->to($user->email, $user->firstname." ".$user->surname)->subject('Our News!');
            });
        }
    }
}
