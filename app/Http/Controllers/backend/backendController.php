<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\education;
use App\Models\Image;
use App\Models\info;
use App\Models\Language;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Barryvdh\DomPDF\Facade\Pdf;

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
        return redirect()->route('user.language')->with($notificaton);

    }
    public function editeducation()
    {
        $educatoin = education::where('user_id', Auth::id())->get();
        return view('backend.editeducation', compact('educatoin'));
    }
    public function editeducationEducation($id)
    {
        $Kind = Level::get();
        $educatoin = education::where('id', $id)->first();
        return view('backend.editeducationeducation', compact('educatoin', 'Kind'));
    }

    public function updateEducation(Request $request)
    {
        $id = $request->id;
        education::findOrFail($id)->update([
                    'eduName' => $request->eduName,
                    'startDate' => $request->startDate,
                    'endDate' => $request->endDate,
                    'level_id' => $request->level_id,
                    'field' => $request->field,
                    'description' => $request->description,
                ]);
        $notificaton  = array(
            'message' => 'Your education has been updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('edit.education')->with($notificaton);

    }

    public function deleteEducation($id)
    {
        education::findOrFail($id)->delete();
        $notificaton  = array(
            'message' => 'Your education has been deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('edit.education')->with($notificaton);
    }

    public function userLanguage()
    {
        return view('backend/language');
    }

    public function saveLanguage(Request $request)
    {
        Language::insert([
            'user_id' => Auth::id(),
            'languageName' => $request->languageName,
        ]);
        $notificaton  = array(
            'message' => 'Your languages has been saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('cv')->with($notificaton);
    }

    public function userImage()
    {
        return view('backend/userImage');
    }

    public function saveImage(Request $request)
    {
        if($request->file('image')) {

            // $manager = new ImageManager(new Driver());
            // $image_name = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            // $img = $manager->read($request->file('image'));
            // $img->resize(480, 480);
            // $img->toJpeg(80)->save(base_path('public/upload' . $image_name);
            // $url = 'upload/' . $image_name;

            // Image::insert([
            //             'user_id' => Auth::id(),
            //             'image' => $url,
            //         ]);
            $notificaton  = array(
                'message' => 'Your image has been saved successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user.image')->with($notificaton);

        }

    }

    public function cv()
    {
        $info = info::where('user_id', Auth::id())->first();
        $profile = Profile::where('user_id', Auth::id())->first();
        $skill = Skill::where('user_id', Auth::id())->get();
        $education = education::where('user_id', Auth::id())->get();
        $language = Language::where('user_id', Auth::id())->get();
        $image = Image::where('user_id', Auth::id())->first();
        return view('backend.cv', compact('info', 'profile', 'skill', 'education', 'language', 'image'));
    }
    public function downloadCv()
    {
        $userId = Auth::id();

        $info = Info::where('user_id', $userId)->first();
        $profile = Profile::where('user_id', $userId)->first();
        $skill = Skill::where('user_id', $userId)->get();
        $education = Education::where('user_id', $userId)->get();
        $language = Language::where('user_id', $userId)->get();
        //$image = Image::where('user_id', $userId)->first();

        if (!$info || !$profile ) {
            return redirect()->back()->with('error', 'Some required information is missing.');
        }

        $pdf = Pdf::loadView('backend.getCv', compact('info', 'profile', 'skill', 'education', 'language'))
        ->setPaper('a4', 'portrait')
        ->setOption('isHtml5ParserEnabled', true);

        return $pdf->download('CV.pdf');
    }
}
