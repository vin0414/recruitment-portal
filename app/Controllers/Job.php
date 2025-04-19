<?php

namespace App\Controllers;

class Job extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['url','form','text']);
        $this->db = db_connect();
    }

    public function saveEducation()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'level'=>'required|is_unique[education_points.level]',
            'from'=>'required|is_unique[education_points.from]',
            'to'=>'required|is_unique[education_points.to]',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            if(session()->get('role')=="Admin"||session()->get('role')=="Super-admin")
            {
                $educationPointModel = new \App\Models\educationPointModel();
                $data = ['from'=>$this->request->getPost('from'),
                         'to'=>$this->request->getPost('to'),
                         'level'=>$this->request->getPost('level'),
                         'account_id'=>session()->get('loggedUser'),
                         'date_created'=>date('Y-m-d')];
                $educationPointModel->save($data);
                //logs
                date_default_timezone_set('Asia/Manila');
                $logModel = new \App\Models\logModel();
                $data = ['account_id'=>session()->get('loggedUser'),
                        'activities'=>'Added new point system for education',
                        'page'=>'Point System',
                        'datetime'=>date('Y-m-d h:i:s a')
                        ];      
                $logModel->save($data);
                return $this->response->SetJSON(['success' => 'Successfully added']);
            }
            $errorMsg = ["level"=>"Invalid Transaction"];
            return $this->response->SetJSON(['error' =>$errorMsg]);
        }
    }

    public function fetchEducationData()
    {
        $educationPointModel = new \App\Models\educationPointModel();
        $searchTerm = $_GET['search']['value'] ?? ''; 
        if ($searchTerm) {
            $educationPointModel->like('from', $searchTerm)
                                ->orlike('to', $searchTerm);
        }

        $education = $educationPointModel->findAll();

        $totalRecords = $educationPointModel->countAllResults();

        $educationPointModel->like('from', $searchTerm)
                            ->orlike('to', $searchTerm);
        $totalFiltered = $educationPointModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($education as $row) {
            $response['data'][] = [
                'level'=>$row['level'],
                'from'=>$row['from'],
                'to' =>$row['to'],
                'action' => '<button class="btn btn-success editEducation" value="' . $row['education_point_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveTraining()
    {
        $validation = $this->validate([
            'csrf_deped'=>'required',
            'training_level'=>'required|is_unique[training_points.level]',
            'from_training'=>'required|is_unique[training_points.from]',
            'to_training'=>'required|is_unique[training_points.to]',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            if(session()->get('role')=="Admin"||session()->get('role')=="Super-admin")
            {
                $trainingPointModel = new \App\Models\trainingPointModel();
                $data = ['from'=>$this->request->getPost('from_training'),
                         'to'=>$this->request->getPost('to_training'),
                         'level'=>$this->request->getPost('training_level'),
                         'account_id'=>session()->get('loggedUser'),
                         'date_created'=>date('Y-m-d')];
                $trainingPointModel->save($data);
                //logs
                date_default_timezone_set('Asia/Manila');
                $logModel = new \App\Models\logModel();
                $data = ['account_id'=>session()->get('loggedUser'),
                        'activities'=>'Added new point system for trainings',
                        'page'=>'Point System',
                        'datetime'=>date('Y-m-d h:i:s a')
                        ];      
                $logModel->save($data);
                return $this->response->SetJSON(['success' => 'Successfully added']);
            }
            $errorMsg = ["level"=>"Invalid Transaction"];
            return $this->response->SetJSON(['error' =>$errorMsg]);
        }
    }

    public function fetchTrainingData()
    {
        $trainingPointModel = new \App\Models\trainingPointModel();
        $searchTerm = $_GET['search']['value'] ?? ''; 
        if ($searchTerm) {
            $trainingPointModel->like('from', $searchTerm)
                                ->orlike('to', $searchTerm);
        }

        $training = $trainingPointModel->findAll();

        $totalRecords = $trainingPointModel->countAllResults();

        $trainingPointModel->like('from', $searchTerm)
                            ->orlike('to', $searchTerm);
        $totalFiltered = $trainingPointModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($training as $row) {
            $response['data'][] = [
                'level'=>$row['level'],
                'from'=>$row['from'],
                'to' =>$row['to'],
                'action' => '<button class="btn btn-success editTraining" value="' . $row['training_point_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveExperience()
    {
        
    }

    public function fetchExperienceData()
    {
        $experiencePointModel = new \App\Models\experiencePointModel();
        $searchTerm = $_GET['search']['value'] ?? ''; 
        if ($searchTerm) {
            $experiencePointModel->like('from', $searchTerm)
                                ->orlike('to', $searchTerm);
        }

        $experience = $experiencePointModel->findAll();

        $totalRecords = $experiencePointModel->countAllResults();

        $experiencePointModel->like('from', $searchTerm)
                            ->orlike('to', $searchTerm);
        $totalFiltered = $experiencePointModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            'data' => [] 
        ];
        foreach ($experience as $row) {
            $response['data'][] = [
                'level'=>$row['level'],
                'from'=>$row['from'],
                'to' =>$row['to'],
                'action' => '<button class="btn btn-success editExperience" value="' . $row['experience_point_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }
}