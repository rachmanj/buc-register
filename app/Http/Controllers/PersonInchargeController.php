<?php

namespace App\Http\Controllers;

use App\Models\PersonIncharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonInchargeController extends Controller
{
    public function index()
    {
        $pincharges = PersonIncharge::all();

        return view('person_incharges.index', compact('pincharges'));
    }

    public function create()
    {
        $response = Http::get('http://192.168.33.37/arka-rest-server/api/project?arka-key=arka123');
        $collection = collect($response->json()['data']);
        $projects = $collection->where('isActive', 'true');

        // return $projects;
        // die;

        return view('person_incharges.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data_tosave = $this->validate($request, [
            'name'      => ['required'],
            'title'     => ['required'],
        ]);

        PersonIncharge::create(array_merge($data_tosave, [
            'project_code'  => $request->project_code,
            'remarks'       => $request->remarks,
            'created_by'    => Auth()->user()->id
        ]));

        return redirect()->route('person_incharge.index')->with('success', 'Data successfully added!');
    }

    public function activate(Request $request)
    {
        $id = $request->id;
        $person_incharge = PersonIncharge::find($id);
        $person_incharge->active = 1;
        $person_incharge->update();

        return redirect()->route('person_incharge.index')->with('success', 'Data successfully activate!');
    }

    public function index_data()
    {
        $list = PersonIncharge::with('creator')->orderBy('name', 'asc')->get();

        return datatables()->of($list)
                ->addColumn('created_by', function ($list) {
                    return $list->creator->fullname . ', ' . $list->created_at->diffForHumans();
                })
                ->addColumn('status', function ($list) {
                    return $list->active == 1 ? 'active' : 'in-active';
                })
                ->addIndexColumn()
                ->addColumn('action', 'person_incharges.action')
                ->rawColumns(['action'])
                ->toJson();
    }
}
