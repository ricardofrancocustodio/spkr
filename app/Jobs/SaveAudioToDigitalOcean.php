<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SaveAudioToDigitalOcean implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $fileName;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $fileName)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Lê o conteúdo do arquivo
        $fileContents = file_get_contents($this->filePath);

        // Faz o upload para o Spaces
        Storage::disk('spaces')->put('audios/' . $this->fileName, $fileContents, 'public');

        // Opcional: Deletar o arquivo local após o upload
        unlink($this->filePath);
    }
}
