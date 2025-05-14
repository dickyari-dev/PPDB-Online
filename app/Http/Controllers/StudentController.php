<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('students.dashboard');
    }

    public function pendaftaran()
    {
        // Cek Apakah Pendaftaran Sudah Dilakukan
        $check = StudentRegistration::where('user_id', auth()->user()->id)->first();
        if ($check) {
            $status = 'sudah';
        } else {
            $status = 'belum';
        }
        return view('students.pendaftaran', compact('status', 'check'));
    }

    public function pendaftaranstore(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nik' => 'required|numeric|digits_between:10,20',
            'place_of_birth' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:L,P',

            'address' => 'required|string',
            'village' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',

            'phone' => 'required|string|max:20',
            'email' => 'required|email',

            'father_name' => 'required|string|max:255',
            'father_occupation' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_occupation' => 'required|string|max:255',
            'parent_income' => 'required|numeric|min:0',

            'previous_school' => 'required|string|max:255',
            'school_address' => 'required|string|max:255',
            'school_npsn' => 'required|string|max:20',
        ]);

        // Simpan data ke tabel pendaftaran (pastikan tabelnya sudah dibuat, misalnya: student_registrations)
        StudentRegistration::create([
            'user_id' => auth()->id(),
            'full_name' => $request->full_name,
            'nik' => $request->nik,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'village' => $request->village,
            'district' => $request->district,
            'city' => $request->city,
            'province' => $request->province,
            'phone' => $request->phone,
            'email' => $request->email,
            'father_name' => $request->father_name,
            'father_occupation' => $request->father_occupation,
            'mother_name' => $request->mother_name,
            'mother_occupation' => $request->mother_occupation,
            'parent_income' => $request->parent_income,
            'previous_school' => $request->previous_school,
            'school_address' => $request->school_address,
            'school_npsn' => $request->school_npsn,
        ]);

        return redirect()->route('student.pendaftaran')->with('success', 'Pendaftaran berhasil dikirim.');
    }
    public function pendaftaranupdate(Request $request)
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
}
