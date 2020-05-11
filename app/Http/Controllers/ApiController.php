<?php

namespace App\Http\Controllers;
use App\IndiaModel;
use App\StateModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function CallApi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://corona-virus-world-and-india-data.p.rapidapi.com/api_india",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: corona-virus-world-and-india-data.p.rapidapi.com",
                "x-rapidapi-key: 17b0303beemsh45a32f7f99a6756p15638cjsn0a25f4fc90cc"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response);
            return $response;
        }
    }

    public function UpdateIndiaData()
    {
        $response = $this->CallApi();
        $ind = IndiaModel::find(1);
        if($ind)
        {
            $ind->active = $response->total_values->active;
            $ind->confirmed = $response->total_values->confirmed;
            $ind->deaths = $response->total_values->deaths;
            $ind->recovered = $response->total_values->recovered;
            $ind->save();
        }
        else
        {
            $ind = new IndiaModel;
            $ind->active    = $response->total_values->active;
            $ind->confirmed = $response->total_values->confirmed;
            $ind->deaths    = $response->total_values->deaths;
            $ind->recovered = $response->total_values->recovered;
            $ind->save();
        }
        $data["active"] = $ind->active;
        $data["confirmed"] = $ind->confirmed;
        $data["deaths"] = $ind->deaths;
        $data["recovered"] = $ind->recovered;
        return response()->json($data);
    }

    public function UpdateStatesData()
    {
        $response = $this->callApi();
        // dd($response);
        $state = StateModel::all();
        if($state->isEmpty())
        {
            // if table is empty then the data will be dumped in db for the first time 
            foreach($response->state_wise as $statedata)
            {
                $state = new StateModel;
                $state->state = $statedata->state;
                $state->active = $statedata->active;
                $state->confirmed = $statedata->confirmed;
                $state->deaths = $statedata->deaths;
                $state->recovered = $statedata->recovered;
                $state->save();
            }
        }
        else
        {
            // if table already has data, then this will update the same data in state_data table
            $state = StateModel::truncate();
            foreach($response->state_wise as $responsestate)
            {
                $state = new StateModel;
                $state->state = $responsestate->state;
                $state->active = $responsestate->active;
                $state->confirmed = $responsestate->confirmed;
                $state->deaths = $responsestate->deaths;
                $state->recovered = $responsestate->recovered;
                $state->save();
            }
        }
        $data = StateModel::all();
        return response()->json($data);
    }
}
