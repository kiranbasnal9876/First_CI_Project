<?php
require_once 'vendor/autoload.php';
class Invoice_crudOperations extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    function insert_Invoice()
    {

        $this->form_validation->set_rules('invoice_no', 'Invoice No', 'required|is_unique[invoice_master.invoice_no]');
        if (!$this->form_validation->run()) {
            $error = $this->form_validation->error_array();

            echo json_encode(['errors' => $error]);
            die;
        }

        $form_data = $this->input->post();

        $this->load->model('Invoice_DataOp');
        echo   $this->Invoice_DataOp->invoice_data($form_data);
    }




    function invoiceNumber()
    {

        $this->load->model('Invoice_DataOp');
        $result = $this->Invoice_DataOp->genrateInvoice();

        echo $result;
    }


    // client auto complete 
    function clientAutocomplete()
    {

        $name = $this->input->post();
        $this->load->model('Invoice_DataOp');
        echo $this->Invoice_DataOp->clientComplete($name);
    }

    // item auto complete

    function itemAutoComplete()
    {
        $data = $this->input->post();
        $this->load->model('Invoice_DataOp');
        echo $this->Invoice_DataOp->itemComplete($data);
    }



    function invoice_pdf()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->load->model('Invoice_DataOp');
            $data['invoice_details'] = $this->Invoice_DataOp->get_invoice_pdfData($id);
        }
        $mr = '3px';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        ob_start();

        // Write some HTML content
        $this->load->helper('download');
        $html = $this->load->view('pdf_html', $data, true);


        $mpdf->WriteHTML($html);

        $data = json_decode($data['invoice_details']);
        $clients = $data->client_details;

        $file = 'invoice_files/' . $clients[0]->invoice_no . '.pdf';

        $mpdf->Output($file, 'I');
    }

    function download_pdf()
    {

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->load->model('Invoice_DataOp');
            $data['invoice_details'] = $this->Invoice_DataOp->get_invoice_pdfData($id);
        }
        $mr = '3px';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = true;
        ob_start();

        // Write some HTML content

        $html = $this->load->view('pdf_html', $data, true);


        $mpdf->WriteHTML($html);

        $data = json_decode($data['invoice_details']);
        $clients = $data->client_details;


        $file = 'invoice_files/' . $clients[0]->invoice_no . '.pdf';

        $mpdf->Output($file, 'F');
    }
}
