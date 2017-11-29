<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Data extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_loans');		
	}

	

	public function get_computation()
    {
    	$interest = $this->db->where('loan_term_id',$this->input->post('lterm_id'))->where('is_actived',1)->get('loan_terms')->row_array();

    	$life_insurance_r = $this->db->where('life_insurance_id',$this->input->post('life_insur_id'))->where('is_actived',1)->get('life_insurances')->row_array();

		$loan_amount = to_decimal($this->input->post('loan_amount_val')); 
		$life_insurance = $life_insurance_r['amount'];	
		$advance_interest =  ceil($loan_amount * $interest['interest']);
		$service_charge = ceil($loan_amount * 0.04);
		$loan_protection_insurance = ceil(($advance_interest + $loan_amount) * 0.01);
		$notarial = 50.00;
		$net_proceeds = $loan_amount - ($notarial + $service_charge + $advance_interest);
        $kasanib_fund =  ceil($loan_amount * 0.05);
        $total_account_receivable = $loan_amount + $kasanib_fund;	
        $loan_amortization = ceil($loan_amount / $interest['loan_divisor']);
    	$kasanib_amortization = ceil($kasanib_fund / $interest['loan_divisor']);
    	$total_cash_out = $life_insurance + $loan_protection_insurance; 
    	$amortization_due = $kasanib_amortization + $loan_amortization;

        $json = array();
        $json['loan_amount'] = $loan_amount;
        $json['life_insurance'] = $life_insurance;
        $json['total_cash_out'] = nf($total_cash_out);
        $json['advance_interest'] = $advance_interest;
        $json['service_charge'] = $service_charge;
        $json['loan_protection_insurance'] = $loan_protection_insurance;
        $json['notarial'] = $notarial;
        $json['net_proceeds'] = nf($net_proceeds);
        $json['kasanib_fund'] = $kasanib_fund;
        $json['total_account_receivable'] = nf($total_account_receivable);
        $json['loan_amortization'] = $loan_amortization;
        $json['kasanib_amortization'] = $kasanib_amortization;
        $json['amortization_due'] = nf($amortization_due) ;
        
        $data[] = $json;
        
        
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function get_members()
    {
    	$this->db->where('member_id',$this->input->post('member_id'));
    	$member = $this->member_loans->get_members();
    	

        $json = array();
        $json['name'] = $member[0]->lastname . ', ' . $member[0]->firstname . ' ' .  $member[0]->middlename;
        $json['street_no'] = $member[0]->street_no;
        $json['barangay'] = $member[0]->barangay;
        $json['municipality'] = $member[0]->municipality;
        $json['province'] = $member[0]->province;
        $json['business_type'] = $member[0]->business_type;
        $json['mobile_no'] = $member[0]->mobile_no;
        $json['loan_program_name'] = $member[0]->loan_program_name;
        $json['loan_category_name'] = $member[0]->loan_category_name;
        $json['LoanCategoryId'] = $member[0]->LoanCategoryId;
        $json['min_loanable_amount'] = $member[0]->min_loanable_amount;        
        $json['max_loanable_amount'] = $member[0]->max_loanable_amount;
        
        $data[] = $json;
        
        
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function get_allowable_loan_amount()
    {
        $loan_category = $this->db->where('loan_category_id',$this->input->post('loan_category_id'))->where('is_actived',1)->get('loan_categories')->row_array();
        
        $json = array();
        $json['min_loanable_amount'] = $loan_category['min_loanable_amount'];        
        $json['max_loanable_amount'] = $loan_category['max_loanable_amount'];
        
        $data[] = $json;
        
        
        header("Content-type: application/json");
        echo json_encode($data);
    }

	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
