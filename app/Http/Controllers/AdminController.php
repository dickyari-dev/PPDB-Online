<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function dataPendaftar()
    {
        $pendaftars = StudentRegistration::all();
        return view('admin.dataPendaftar', compact('pendaftars'));
    }

    public function dataPendaftarShow($id)
    {
        $siswa = StudentRegistration::find($id);
        return view('admin.pendaftar-show', compact('siswa'));
    }

    public function dataPendaftarUpdate($id)
    {
        $check = StudentRegistration::find($id);
        return view('admin.pendaftaran-update', compact('check'));
    }

    public function pendaftarUpdatePost(Request $request)
    {
        $request->validate([
            'full_name'         => 'required|string|max:255',
            'nik'               => 'required|string|max:20',
            'place_of_birth'    => 'required|string|max:100',
            'date_of_birth'     => 'required|date',
            'gender'            => 'required|in:L,P',
            'address'           => 'required|string',
            'village'           => 'required|string|max:100',
            'district'          => 'required|string|max:100',
            'city'              => 'required|string|max:100',
            'province'          => 'required|string|max:100',
            'phone'             => 'required|string|max:20',
            'email'             => 'required|email',
            'father_name'       => 'required|string|max:255',
            'father_occupation' => 'required|string|max:255',
            'mother_name'       => 'required|string|max:255',
            'mother_occupation' => 'required|string|max:255',
            'parent_income'     => 'required|numeric',
            'previous_school'   => 'required|string|max:255',
            'school_address'    => 'required|string',
            'school_npsn'       => 'required|string|max:20',
        ]);

        $registration = StudentRegistration::findOrFail($request->id);

        $registration->update([
            'full_name'         => $request->full_name,
            'nik'               => $request->nik,
            'place_of_birth'    => $request->place_of_birth,
            'date_of_birth'     => $request->date_of_birth,
            'gender'            => $request->gender,
            'address'           => $request->address,
            'village'           => $request->village,
            'district'          => $request->district,
            'city'              => $request->city,
            'province'          => $request->province,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'father_name'       => $request->father_name,
            'father_occupation' => $request->father_occupation,
            'mother_name'       => $request->mother_name,
            'mother_occupation' => $request->mother_occupation,
            'parent_income'     => $request->parent_income,
            'previous_school'   => $request->previous_school,
            'school_address'    => $request->school_address,
            'school_npsn'       => $request->school_npsn,
        ]);

        return redirect()->back()->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    public function dataPendaftarDelete($id)
    {
        $siswa = StudentRegistration::find($id);
        $siswa->delete();
        return redirect()->back()->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    public function dataAccount()
    {
        $users = User::where('role', 'students')->get();
        return view('admin.dataAccount', compact('users'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
