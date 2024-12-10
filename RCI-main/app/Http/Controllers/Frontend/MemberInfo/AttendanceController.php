<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $attendances = Attendance::paginate(10);
        $members = Member::all();

        $startYear = 1958;
        $endYear = date('Y');

        $years = range($endYear, $startYear);

        return view('frontend.member-info.attendance.list', compact('attendances', 'members', 'years'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $attendances = Attendance::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('member_id', 'like', '%' . $query . '%')
                    ->orWhere('attendance_status', 'like', '%' . $query . '%')
                    ->orWhere('attendance_date', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.attendance.table', compact('attendances'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $startYear = 1958;
        $endYear = date('Y');

        $years = range($endYear, $startYear);
        $months = range(1, 12);

        return view('frontend.member-info.attendance.form', compact('members', 'years', 'months'));
    }

    public function memberAttendances(Request $request)
    {
        $member_id = $request->member_id;
        $year = $request->year;
        $month = $request->month;

        $attendances = Attendance::where('member_id', $member_id)
            ->whereYear('attendance_date', $year)
            ->whereMonth('attendance_date', $month)
            ->get();

        return response()->json(['attendances' => $attendances]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'member_id' => 'required',
        //     'attendance_status' => 'required',
        //     'attendance_date' => 'required',
        // ]);

        // $attendance = new Attendance();
        // $attendance->member_id = $request->member_id;
        // $attendance->attendance_status = $request->attendance_status;
        // $attendance->attendance_date = $request->attendance_date;
        // $attendance->status = $request->status;
        // $attendance->save();
        $event = [
            'member_id' => $request->member_id,
            'year' => $request->year,
            'month' => $request->month,
        ];
        return response()->json(['events' => [$event]]);

        // session()->flash('success', 'Attendance created successfully!');
        // return redirect()->route('frontend.member_info.attendance.index')->with('success', 'Attendance created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $edit = true;

        return view('frontend.member-info.attendance.form', compact('attendance', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            'attendance_status' => 'required',
            'attendance_date' => 'required',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->member_id = $request->member_id;
        $attendance->attendance_status = $request->attendance_status;
        $attendance->attendance_date = $request->attendance_date;
        $attendance->status = $request->status;
        $attendance->update();

        session()->flash('success', 'Attendance updated successfully!');
        return redirect()->route('frontend.member_info.attendance.index')->with('success', 'Attendance updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        

        session()->flash('success', 'Attendance deleted successfully!');
        return redirect()->route('frontend.member_info.attendance.index')->with('success', 'Attendance deleted successfully!');
    }
}
