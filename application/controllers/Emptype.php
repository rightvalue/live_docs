<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Emptype extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Emptype_model');
    } 

    /*
     * Listing of emptypes
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('emptype/index?');
        $config['total_rows'] = $this->Emptype_model->get_all_emptypes_count();
        $this->pagination->initialize($config);

        $data['emptypes'] = $this->Emptype_model->get_all_emptypes($params);
        
        $data['_view'] = 'emptype/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new emptype
     */
    function add()
    {   
        if(!$this->auth->isAdd()){
            redirect('/');
        }
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'ctname' => $this->input->post('ctname'),
            );
            
            $emptype_id = $this->Emptype_model->add_emptype($params);
            redirect('emptype/index');
        }
        else
        {            
            $data['_view'] = 'emptype/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a emptype
     */
    function edit($Ctype)
    {   
        if(!$this->auth->isEdit()){
            redirect('/');
        }
        // check if the emptype exists before trying to edit it
        $data['emptype'] = $this->Emptype_model->get_emptype($Ctype);
        
        if(isset($data['emptype']['Ctype']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'ctname' => $this->input->post('ctname'),
                );

                $this->Emptype_model->update_emptype($Ctype,$params);            
                redirect('emptype/index');
            }
            else
            {
                $data['_view'] = 'emptype/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The emptype you are trying to edit does not exist.');
    } 

    /*
     * Deleting emptype
     */
    function remove($Ctype)
    {
        if(!$this->auth->isDelete()){
            redirect('/');
        }
        $emptype = $this->Emptype_model->get_emptype($Ctype);

        // check if the emptype exists before trying to delete it
        if(isset($emptype['Ctype']))
        {
            $this->Emptype_model->delete_emptype($Ctype);
            redirect('emptype/index');
        }
        else
            show_error('The emptype you are trying to delete does not exist.');
    }
    
}
