<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\education;
use App\Models\info;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class backendController extends Controller
{
    //
    public function userCV()
    {
        return view('backend/basicinfo');
    }

    public function userLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function saveInfo(Request $request)
    {
        info::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
        ]);

        $notificaton  = array(
            'message' => 'Your Information has been saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.profile')->with($notificaton);
    }

    public function userProfile()
    {
        return view('backend/profile');
    }

    public function saveProfile(Request $request)
    {
        Profile::insert([
            'user_id' => Auth::id(),
            'desc' => $request->desc,
        ]);
        $notificaton  = array(
            'message' => 'Your Profile has been saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.skill')->with($notificaton);
    }

    public function editInfo()
    {
        $info = info::where('user_id', Auth::id())->first();
        return view('backend.editinfo', compact('info'));
    }

    public function updateInfo(Request $request)
    {
        $id = $request->id;
        info::findOrFail($id)->update([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
        ]);

        $notificaton  = array(
            'message' => 'Your Information has been updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificaton);
    }

    public function editProfile()
    {
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('backend.editprofile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {

        $id = $request->id;
        Profile::findOrFail($id)->update([
                    'user_id' => Auth::id(),
                    'desc' => $request->desc,
                ]);
        $notificaton  = array(
            'message' => 'Your Profile has been updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificaton);
    }

    public function userSkill()
    {
        return view('backend/skill');
    }

    public function saveSkill(Request $request)
    {
        Skill::insert([
            'user_id' => Auth::id(),
            'skillName' => $request->skillName,
        ]);
        $notificaton  = array(
            'message' => 'Your Skills has been saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.educaton')->with($notificaton);
    }

    public function editSkill()
    {
        $skill = Skill::where('user_id', Auth::id())->first();
        return view('backend.editskill', compact('skill'));
    }

    public function updateSkill(Request $request)
    {
        $id = $request->id;
        Skill::findOrFail($id)->update([
                    'user_id' => Auth::id(),
                    'skillName' => $request->skillName,
                ]);
        $notificaton  = array(
            'message' => 'Your Skills has been updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificaton);
    }

    public function userEducaton()
    {
        $Kind = Level::get();
        return view('backend/educaton', compact('Kind'));
    }

    public function saveEduo(Request $request)
    {
        education::insert([
                    'user_id' => Auth::id(),
                    'eduName' => $request->eduName,
                    'startDate' => $request->startDate,
                    'endDate' => $request->endDate,
                    'level_id' => $request->level_id,
                    'field' => $request->field,
                    'description' => $request->description,
                ]);

        $notificaton  = array(
            'message' => 'Your education has been saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('save.eduo')->with($notificaton);

    }



}
