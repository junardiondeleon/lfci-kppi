
<div class="row">
  <div class="col-md-4">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Personal and Contact Information</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
          <div class="row">
            <?php echo $form_url; ?>
            <div class="col-md-12">
              <div class="form-group">
                <label for="lastname">Select Member</label>
                <?php echo form_dropdown('MemberId', $members, $this->input->post('MemberId') ? $this->input->post('MemberId') : $member_loan->MemberId, 'id="MemberId" class="form-control select2" data-placeholder="Please select a member"' ) ?>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" readonly="" name="name" id="name" value="<?php echo set_value('name', $member_loan->name);?>">
              </div>
              
              
              <div class="form-group">
                <label for="street_no">Street No</label>
                <input type="text" class="form-control" readonly="" name="street_no" id="street_no" placeholder="" value="<?php echo set_value('street_no', $member_loan->street_no);?>">
              </div>
              <div class="form-group">
                <label for="barangay">Barangay</label>
                <input type="text" class="form-control" readonly="" name="barangay" id="barangay" placeholder="" value="<?php echo set_value('barangay', $member_loan->barangay);?>">
              </div>
              <div class="form-group">
                <label for="municipality">Municipality</label>
                <input type="text" class="form-control" readonly="" name="municipality" id="municipality" placeholder="" value="<?php echo set_value('municipality', $member_loan->municipality);?>">
              </div>
              <div class="form-group">
                <label for="province">Province</label>
                <input type="text" class="form-control" readonly="" name="province" id="province" placeholder="" value="<?php echo set_value('province', $member_loan->province);?>">
              </div>
              

              <div class="form-group">
                <label for="mobile_no">Mobile No</label>
                <input type="text" class="form-control" readonly="" name="mobile_no" id="mobile_no" placeholder="" value="<?php echo set_value('mobile_no', $member_loan->mobile_no);?>">
              </div>

              <div class="form-group">
                <label for="business_type">Business Type</label>
                <input type="text" class="form-control" readonly="" name="business_type" id="business_type" placeholder="" value="<?php echo set_value('business_type', $member_loan->business_type);?>">
              </div>  
              
            </div>
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Loan Requirements</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
    <div class="row">
      <div class="col-md-12">
      <?php echo form_dropdown('loan_requirements[]', $loan_requirements, $this->input->post('loan_requirements[]') ? $this->input->post('loan_requirements[]') : explode(',', $member_loan->loan_requirements), 'id="loan_requirements" class="form-control select2" multiple="multiple" data-placeholder="Please select loan requirements"' ) ?>  
      
    </div>
    </div>
  </div>
</div>

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Loan Collaterals</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="loan_collateral_details">Loan Collateral Type</label>
      <?php echo form_dropdown('loan_collaterals[]', $loan_collaterals, $this->input->post('loan_collaterals[]') ? $this->input->post('loan_collaterals[]') : explode(',', $member_loan->loan_collaterals), 'id="loan_collaterals" class="form-control select2" multiple="multiple" data-placeholder="Please select loan collaterals"' ) ?>  
      </div>
    
    
    <div class="form-group">
          <label for="loan_collateral_details">Loan Collateral Details</label>
           <textarea id="loan_collateral_details" name="loan_collateral_details" class="form-control" rows="6" placeholder="Remarks"><?php echo set_value('loan_collateral_details', strip_tags($member_loan->loan_collateral_details)); ?></textarea>
        </div>
        </div>
    </div>
  </div>
</div>      

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Loan Collector</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="lastname">Select Loan Collector</label>
          <?php echo form_dropdown('collector_id', $loan_collectors, $this->input->post('collector_id') ? $this->input->post('collector_id') : $member_loan->collector_id, 'id="collector_id" class="form-control select2" data-placeholder="Please select a loan collector"' ) ?>
          <input type="hidden" name="collector_name" id="collector_name" value="<?php echo set_value('collector_name', $member_loan->collector_name);?>">
        </div>
      </div>
   </div>
 </div>    
</div>




</div>




<div class="col-md-8">
  
  

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Loan Details</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
   
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="transaction_no">Transaction No</label>
            
             <input type="text" class="form-control" readonly="" name="transaction_no" id="transaction_no" placeholder="" value="<?php echo set_value('transaction_no', $member_loan->transaction_no);?>">
          
          </div>
          <div class="form-group">
            <label for="loan_program">Loan Program</label>
             <input type="hidden" name="LoanProgramId" id="LoanProgramId" 
             value="<?php echo set_value('LoanProgramId', $this->config->item('p3_program_id'));?>">
             <input type="text" class="form-control" readonly="" name="loan_program" id="loan_program" placeholder="" value="<?php echo set_value('loan_program', $member_loan->loan_program);?>">
          
          </div>
          <div class="form-group">
            <label for="loan_category">Loan Category</label>
            <input type="hidden" name="LoanCategoryId" id="LoanCategoryId" value="<?php echo set_value('LoanCategoryId', $member_loan->LoanCategoryId);?>">
             <input type="text" class="form-control" readonly="" name="loan_category" id="loan_category" placeholder="" value="<?php echo set_value('loan_category', $member_loan->loan_category);?>">
          
          </div>
         
           <div class="form-group">
            <label for="LoanTermId">Loan Term</label>
            <input type="hidden" name="loan_term" id="loan_term" value="<?php echo set_value('loan_term', $member_loan->loan_term);?>">
             <?php echo form_dropdown('LoanTermId', $loan_terms, $this->input->post('LoanTermId') ? $this->input->post('LoanTermId') : $member_loan->LoanTermId, 'id="LoanTermId" class="form-control select2" data-placeholder="Please select a loan term"' ) ?>
          
          
          </div>
         
          <div class="form-group">
            <label for="LifeInsuranceId">Life Insurance</label>
            <input type="hidden" name="life_insurance" id="life_insurance" value="<?php echo set_value('life_insurance', $member_loan->life_insurance);?>">
            <?php echo form_dropdown('LifeInsuranceId', $life_insurances, $this->input->post('LifeInsuranceId') ? $this->input->post('LifeInsuranceId') : $member_loan->LifeInsuranceId, 'id="LifeInsuranceId" class="form-control select2" data-placeholder="Please select a life insurance"' ) ?>
          </div>
          



        </div>
       
       <div class="col-md-6">
          <div class="form-group">
            <label for="date_of_filing">Filing Date</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker" name="date_of_filing" id="date_of_filing" placeholder="Enter Filing Date" value="<?php echo set_value('date_of_filing', $member_loan->date_of_filing);?>">
            
            </div>
            <!-- /.input group -->
        </div>
          <div class="form-group">
            <label for="min_loanable_amount">Minimum Loanable Amount</label>
            <input type="text" class="form-control deci" readonly="" name="min_loanable_amount" id="min_loanable_amount" placeholder="" value="<?php echo set_value('min_loanable_amount', $member_loan->min_loanable_amount);?>">
          </div>
          <div class="form-group">
            <label for="max_loanable_amount">Maximum Loanable Amount</label>
            <input type="text" class="form-control deci" readonly="" name="max_loanable_amount" id="max_loanable_amount" placeholder="" value="<?php echo set_value('max_loanable_amount', $member_loan->max_loanable_amount);?>">
          </div>

          <div class="form-group">
            <label for="ModeOfPaymentId">Mode of Payment</label>
            <input type="hidden" name="mode_of_payment" id="mode_of_payment" value="<?php echo set_value('mode_of_payment', $member_loan->mode_of_payment);?>">
            <?php echo form_dropdown('ModeOfPaymentId', $mode_of_payments, $this->input->post('ModeOfPaymentId') ? $this->input->post('ModeOfPaymentId') : $member_loan->ModeOfPaymentId, 'id="ModeOfPaymentId" class="form-control select2" data-placeholder="Please select a mode of payment"' ) ?>
          </div>
         
          <div class="form-group">
            <label for="loan_amount">Loan Amount</label>
            <input type="text" name="loan_amount" class="form-control deci"  id="loan_amount" placeholder="Enter Loan Amount" value="<?php echo set_value('loan_amount', $member_loan->loan_amount);?>" >
          </div>



        </div>
      </div>
      <!-- /.row -->
    </div>
    
    <div class="box-footer">
    <button type="button" name="btn_compute" id="btn_compute" class="btn btn-info btn-lg"><i class='fa fa-calculator  '></i> Compute</button>
    

    
  </div>

  </div>

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Computation of Cash Out</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
   
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="kapamilya_insurance">Life Insurance</label>
             <input type="text" class="form-control deci"  readonly="" name="kapamilya_insurance" id="kapamilya_insurance" placeholder="" value="<?php echo set_value('kapamilya_insurance', $member_loan->kapamilya_insurance);?>">
          
          </div>
        
        </div>
       
       <div class="col-md-6">
          
          <div class="form-group">
            <label for="loan_protection_insurance">Loan Protection Insurance</label>
            <input type="text" class="form-control deci" readonly="" name="loan_protection_insurance" id="loan_protection_insurance" placeholder="" value="<?php echo set_value('loan_protection_insurance', $member_loan->loan_protection_insurance);?>">
          </div>
          



        </div>
      </div>
      <!-- /.row -->
      
    </div>
    
    <div class="box-footer">
        <div class="row">
          <div class="col-md-6"><input type="hidden" readonly="" name="total_cash_out" id="total_cash_out" value="<?php echo set_value('total_cash_out', $member_loan->total_cash_out);?>"></div>
          <div class="col-md-6 pull-right total-val" >Total: Php. <span class="deci" id="total_cash_out_display"><?php echo ($member_loan->total_cash_out) ? nf($member_loan->total_cash_out) : '0.00'; ?></span></div>
        </div>
      </div>
  </div>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Computation of Net Proceeds</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
   
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="principal_amount">Principal Amount</label>
             <input type="text" class="form-control deci" readonly="" name="principal_amount" id="principal_amount"  value="<?php echo set_value('principal_amount', $member_loan->loan_amount);?>">
          
          </div>

          <div class="form-group">
            <label for="service_charge">Service Charge</label>
             <input type="text" class="form-control deci" readonly="" name="service_charge" id="service_charge"  value="<?php echo set_value('service_charge', $member_loan->service_charge);?>">
          
          </div>
        
        </div>
       
       <div class="col-md-6">
          
          <div class="form-group">
            <label for="notarial">Notarial</label>
            <input type="text" class="form-control deci" readonly="" name="notarial" id="notarial"  value="<?php echo set_value('notarial', $member_loan->notarial);?>">
          </div>
          
          <div class="form-group">
            <label for="advance_interest">Advanced Interest</label>
            <input type="text" class="form-control deci" readonly="" name="advance_interest" id="advance_interest"  value="<?php echo set_value('advance_interest', $member_loan->advance_interest);?>">
          </div>


        </div>
      </div>
      <!-- /.row -->
      
    </div>
    
    <div class="box-footer">
        <div class="row">
          <div class="col-md-6"><input type="hidden" readonly="" name="net_proceeds" id="net_proceeds" value="<?php echo set_value('net_proceeds', $member_loan->net_proceeds);?>"></div>
          <div class="col-md-6 pull-right total-val">Total: Php <span class="deci" id="net_proceeds_display"><?php echo ($member_loan->net_proceeds) ? nf($member_loan->net_proceeds) : '0.00'; ?></span></div>
        </div>
      </div>
  </div>

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Computation of Full Account Receivable</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
   
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="principal_amount">Principal Amount</label>
             <input type="text" class="form-control deci" readonly="" name="principal_amount" id="principal_amount"  value="<?php echo set_value('principal_amount', $member_loan->loan_amount);?>">
          
          </div>
        
        </div>
       
       <div class="col-md-6">
          
          <div class="form-group">
            <label for="kasanib_fund">Kasanib Fund</label>
             <input type="text" class="form-control deci" readonly="" name="kasanib_fund" id="kasanib_fund"  value="<?php echo set_value('kasanib_fund', $member_loan->kasanib_fund);?>">
          
          </div>
          



        </div>
      </div>
      <!-- /.row -->
      
    </div>
    
    <div class="box-footer">
        <div class="row">
          <div class="col-md-6"><input type="hidden" name="total_account_receivable" id="total_account_receivable" value="<?php echo set_value('total_account_receivable', $member_loan->total_account_receivable);?>"></div>
          <div class="col-md-6 pull-right total-val">Total: Php <span class="deci" id="total_account_receivable_display"><?php echo ($member_loan->total_account_receivable) ? nf($member_loan->total_account_receivable) : '0.00'; ?></span></div>
        </div>
      </div>
  </div>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Computation of Full Amortization</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
   
    <div class="box-body" style="">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="loan_amortization">Principal Amount</label>
             <input type="text" class="form-control deci" readonly="" name="loan_amortization" id="loan_amortization"  value="<?php echo set_value('loan_amortization', $member_loan->loan_amortization);?>">
          
          </div>
        
        </div>
       
       <div class="col-md-6">
          
          <div class="form-group">
            <label for="kasanib_amortization">Kasanib Fund (5% of Principal Amortization)</label>
            <input type="text" class="form-control deci" readonly="" name="kasanib_amortization" id="kasanib_amortization" placeholder="" value="<?php echo set_value('kasanib_amortization', $member_loan->kasanib_amortization);?>">
          </div>
          



        </div>
      </div>
      <!-- /.row -->
      
    </div>
    
    <div class="box-footer">
        <div class="row">
          <div class="col-md-6"><input type="hidden" name="amortization_due" id="amortization_due" value="<?php echo set_value('amortization_due', $member_loan->amortization_due);?>"></div>
          <div class="col-md-6 pull-right total-val">Total: Php <span class="deci" id="amortization_due_display"><?php echo ($member_loan->amortization_due) ? nf($member_loan->amortization_due) : '0.00'; ?></span></div>
        </div>
      </div>
  </div>

  

</div>

</div>
<?php if(!$new_trans): ?>
<div class="row">
  <div class="col-md-12">
    


<?php $this->load->view($comments_view); ?>

</div>
</div>
<?php endif; ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

<div class="box-footer">
    <input type="hidden" name="AreaId" id="AreaId" value="<?php echo $this->session->userdata('area_id'); ?>">
    <button type="submit" class="btn btn-primary btn-lg" name="btn_save" value="Save">Save</button>
    <?php if(isset($member_loan->created_by) and $member_loan->created_by > 0): ?>
    <button type="submit" class="btn btn-primary-dark btn-lg" name="btn_save" value="Save as Final">Save as Final</button>
    <?php endif; ?>
    <a href="<?php echo site_url('p3')?>" class="btn btn-default btn-lg">Cancel</a>

    <?php echo form_close(); ?>
  </div>

</div>
</div>
</div>

