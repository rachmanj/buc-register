<?php

namespace App\Http\Controllers;

use App\Models\Buc;
use App\Models\PersonIncharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BucController extends Controller
{
    public function index()
    {
        return view('bucs.index');
    }

    public function create()
    {
        $response = Http::get('http://192.168.33.37/arka-rest-server/api/project?arka-key=arka123');
        $collection = collect($response->json()['data']);
        $projects = $collection->where('isActive', 'true');

        $pincharges = PersonIncharge::orderBy('name', 'asc')->get();

        return view('bucs.create', compact('projects', 'pincharges'));
    }

    public function store(Request $request)
    {
        $data_tosave = $this->validate($request, [
            'nomor'                 => ['required'],
            'activity_name'         => ['required'],
            'project_code'          => ['required'],
            'person_incharge_id'    => ['required'],
            'start_date'            => ['required'],
            'budget'                => ['required'],
            'duration'              => ['required'],
        ]);

        Buc::create(array_merge($data_tosave, [
            'status'                => 'PROGRESS',
            'remarks'               => $request->remarks,
            'created_by'            => Auth()->user()->id,
        ]));

        return redirect()->route('buc.index')->with('success', 'Data succesfully added');
    }

    public function edit($id)
    {
        $buc = Buc::find($id);
        $response = Http::get('http://192.168.33.37/arka-rest-server/api/project?arka-key=arka123');
        $collection = collect($response->json()['data']);
        $projects = $collection->where('isActive', 'true');

        $pincharges = PersonIncharge::orderBy('name', 'asc')->get();

        return view('bucs.edit', compact('buc', 'projects', 'pincharges'));
    }

    public function index_data()
    {
        $bucs = Buc::with('pincharge')->latest()->get();

        return datatables()->of($bucs)
                ->addColumn('incharge', function ($bucs) {
                    return $bucs->pincharge->name;
                })
                ->editColumn('duration', function ($bucs) {
                    return $bucs->duration . ' days';
                })
                ->editColumn('start_date', function ($bucs) {
                    return date('d-M-Y', strtotime($bucs->start_date));
                })
                ->addIndexColumn()
                ->addColumn('action', 'bucs.action')
                ->rawColumns(['action'])
                ->toJson();
    }
}
