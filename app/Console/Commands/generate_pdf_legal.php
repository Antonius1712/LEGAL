<?php

namespace App\Console\Commands;

use App\Model\SheetBpkb;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class generate_pdf_legal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:generate-pdf-sheet-bpkb-legal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate PDF Legal Sheet BPKB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->publicPath = env('PUBLIC_PATH');
        $this->baseUrl = env('APP_URL');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // STATUS 5 = FILING.
        try {
            $sheet_bpkb = SheetBpkb::where('status', 5)->get();
            foreach( $sheet_bpkb as $key => $val ){
                $pageTitle = 'Halaman';
                $pageOfTitle = 'Dari';
        
                $url = $this->baseUrl . '/'. 'generate-pdf-sheet-bpkb-legal/' . $val->id;
                $destination = $this->publicPath . 'storage/app/public/pdf-sheet-bpkb-legal/'.date('Y', strtotime($val->created_at));
                
                if (!File::isDirectory($destination)) {
                    File::makeDirectory($destination, 0777, true);
                }
                $filename = 'sheet_bpkb_'.$val->check_sheet_id;
                $destinationPath = $destination .'/'.$filename.'.pdf';

                if( !file_exists($destinationPath) ){
                    $cmd = env('WKHTMLTOPDF')." -q --margin-top 10 --margin-left 5 --margin-right 5 --footer-font-size 6 --footer-left \"{$val->no_polis}\" --footer-right \"{$pageTitle} [page] {$pageOfTitle} [topage]\" {$url} {$destinationPath}";
                    exec($cmd);
                    echo($destinationPath);
                }else{
                    // echo('Data Sudah ada \n ');
                    // echo('Hapus Data Lama \n ');
                    // $unlink = unlink($destinationPath);
                    // if( $unlink ){
                    //     echo('generate \n ');
                    //     $cmd = env('WKHTMLTOPDF')." -q --margin-top 10 --margin-left 5 --margin-right 5 --footer-font-size 6 --footer-left \"{$val->no_polis}\" --footer-right \"{$pageTitle} [page] {$pageOfTitle} [topage]\" {$url} {$destinationPath}";
                    //     exec($cmd);
                    //     echo($destinationPath);  
                    // }else{
                    //     echo('error 2 \n ');
                    // }
                    echo('File sudah ada '. $destinationPath);
                }
            }
        } catch(\Exception $e) {
            return $e;
        }
    }
}
