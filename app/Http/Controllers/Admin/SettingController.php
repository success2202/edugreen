<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    //
    public function index()
    {
        $school = SchoolSetting::first();

        return view('admin.settings.index', compact('school'));
    }


    /**
     * Update school settings.
     */
    // public function update(Request $request)
    // {
    //     $validated = $request->validate([
    //         'school_name' => 'required|string|max:255',

    //         'school_address' => 'nullable|string|max:1000',

    //         'phone' => 'nullable|string|max:50',

    //         'email' => 'nullable|email|max:255',

    //         'session' => 'required|string|max:20',

    //         'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    //         'favicon' => 'nullable|mimes:jpg,jpeg,png,ico,webp|max:1024',

    //         'facebook' => 'nullable|url|max:500',

    //         'instagram' => 'nullable|url|max:500',

    //         'twitter' => 'nullable|url|max:500',

    //         'linkedin' => 'nullable|url|max:500',
    //         'current_term' => 'required|in:first_term,second_term,third_term',
    //     ]);


    //     /*
    //     |--------------------------------------------------------------------------
    //     | Get Existing Settings
    //     |--------------------------------------------------------------------------
    //     */

    //     $school = SchoolSetting::first();


    //     /*
    //     |--------------------------------------------------------------------------
    //     | Create Settings Record If It Doesn't Exist
    //     |--------------------------------------------------------------------------
    //     */

    //     if (!$school) {

    //         $school = new SchoolSetting();

    //     }


    //     /*
    //     |--------------------------------------------------------------------------
    //     | School Logo
    //     |--------------------------------------------------------------------------
    //     */

    //     if ($request->hasFile('logo')) {

    //         // Delete old logo
    //         if ($school->logo && Storage::disk('public')->exists($school->logo)) {

    //             Storage::disk('public')->delete($school->logo);

    //         }

    //         // Upload new logo
    //         $validated['logo'] = $request
    //             ->file('logo')
    //             ->store('school', 'public');
    //     }


    //     /*
    //     |--------------------------------------------------------------------------
    //     | Favicon
    //     |--------------------------------------------------------------------------
    //     */

    //     if ($request->hasFile('favicon')) {

    //         // Delete old favicon
    //         if ($school->favicon && Storage::disk('public')->exists($school->favicon)) {

    //             Storage::disk('public')->delete($school->favicon);

    //         }

    //         // Upload new favicon
    //         $validated['favicon'] = $request
    //             ->file('favicon')
    //             ->store('school', 'public');
    //     }


    //     /*
    //     |--------------------------------------------------------------------------
    //     | Save Settings
    //     |--------------------------------------------------------------------------
    //     */

    //     $school->fill($validated);

    //     $school->save();


    //     return redirect()
    //         ->route('admin.settings.index')
    //         ->with('success', 'School settings updated successfully.');
    // }


    
public function update(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | Validate Form Data
    |--------------------------------------------------------------------------
    */

    $validated = $request->validate([
        'school_name' => 'required|string|max:255',
        'school_address' => 'nullable|string|max:1000',
        'phone' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:255',
        'session' => 'required|string|max:20',

        'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'favicon' => 'nullable|mimes:jpg,jpeg,png,ico,webp|max:1024',

        'facebook' => 'nullable|url|max:500',
        'instagram' => 'nullable|url|max:500',
        'twitter' => 'nullable|url|max:500',
        'linkedin' => 'nullable|url|max:500',

        'current_term' => 'required|in:first_term,second_term,third_term',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Get Existing Settings
    |--------------------------------------------------------------------------
    */

    $school = SchoolSetting::first();

    if (!$school) {
        $school = new SchoolSetting();
    }

    /*
    |--------------------------------------------------------------------------
    | Set Logo and Favicon Folder
    |--------------------------------------------------------------------------
    */

    $imagePath = public_path('frontend/assets/img/logo');

    // Create folder if it does not exist
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    /*
    |--------------------------------------------------------------------------
    | Upload School Logo
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('logo')) {

        // Delete old logo if it exists in the logo folder
        if ($school->logo) {
            $oldLogo = $imagePath . '/' . basename($school->logo);

            if (is_file($oldLogo)) {
                unlink($oldLogo);
            }
        }

        // Generate unique filename
        $logoFilename = 'school_logo_' . uniqid() . '.' .
            $request->file('logo')->getClientOriginalExtension();

        // Move uploaded logo into the folder
        $request->file('logo')->move(
            $imagePath,
            $logoFilename
        );

        // Save filename in database
        $validated['logo'] = $logoFilename;
    }

    /*
    |--------------------------------------------------------------------------
    | Upload Favicon
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('favicon')) {

        // Delete old favicon if it exists in the logo folder
        if ($school->favicon) {
            $oldFavicon = $imagePath . '/' . basename($school->favicon);

            if (is_file($oldFavicon)) {
                unlink($oldFavicon);
            }
        }

        // Generate unique filename
        $faviconFilename = 'favicon_' . uniqid() . '.' .
            $request->file('favicon')->getClientOriginalExtension();

        // Move uploaded favicon into the folder
        $request->file('favicon')->move(
            $imagePath,
            $faviconFilename
        );

        // Save filename in database
        $validated['favicon'] = $faviconFilename;
    }

    /*
    |--------------------------------------------------------------------------
    | Save School Settings
    |--------------------------------------------------------------------------
    */

    $school->fill($validated);
    $school->save();

    return redirect()
        ->route('admin.settings.index')
        ->with('success', 'School settings updated successfully.');
}

}
