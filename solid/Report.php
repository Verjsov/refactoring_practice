<?php

//Hint - use Single Responsibility Principle Violation

interface OutputInterface
{
    public function formatingRepo();
}

class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2016-04-21';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

class ReportJson implements OutputInterface
{
    protected $repo;

    public function __construct(Report $repo)
    {
        $this->repo = $repo;
    }

    public function formatingRepo()
    {
        return json_encode($this->repo->getContents());
    }
}