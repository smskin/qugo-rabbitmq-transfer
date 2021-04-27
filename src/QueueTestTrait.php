<?php

namespace Qugo\RabbitMQTransfer;

use Illuminate\Support\Facades\DB;

trait QueueTestTrait
{
    protected function deleteJobs(): void
    {
        $jobs = DB::table('jobs')->get('*');
        foreach ($jobs as $j) {
            DB::table('jobs')->delete($j->id);
        }
    }

    protected function runJob()
    {
        $job = DB::table('jobs')->first();
        unserialize(json_decode($job->payload)->data->command)->handle();
    }

    protected function deleteJob()
    {
        $job = DB::table('jobs')->first();
        DB::table('jobs')->delete($job->id);
    }

    protected function runJobAndDelete()
    {
        $job = DB::table('jobs')->first();
        $this->deleteJobs();
        unserialize(json_decode($job->payload)->data->command)->handle();
    }
}
