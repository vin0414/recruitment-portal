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
                'action' => '<button class="btn btn-success editTraining" value="' . $row['education_training_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
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
                'action' => '<button class="btn btn-success editExperience" value="' . $row['education_experience_id'] . '"><i class="ti ti-edit"></i>&nbsp;Edit</button>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }
}