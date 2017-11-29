
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
        <div class="box-body view-only" style="">
          <div class="row">
            
            <div class="col-md-12">
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
 
  <div class="box-body view-only" style="">
    <div class="row">
      <div class="col-md-12">
        
         <textarea id="loan_requirements" readonly name="loan_requirements" class="form-control" rows="3" placeholder="Remarks"><?php echo set_value('loan_requirements', $member_loan->loan_requirements);?></textarea>
    
    </div>
    </div>
  </div>
</div>        


<?php $this->load->view($comments_view); ?>
</div>




<div class="col-md-8">
  
  

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Loan Details</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
   
    <div class="box-body view-only" style="">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group view-only">
            <label for="transaction_no">Transaction No</label>
            
             <input type="text" class="form-control" readonly="" name="transaction_no" id="transaction_no" placeholder="" value="<?php echo set_value('transaction_no', $member_loan->transaction_no);?>">
          
          </div>
          <div class="form-group view-only">
            <label for="loan_program">Loan Program</label>
             
             <input type="text" class="form-control" readonly="" name="loan_program" id="loan_program" placeholder="" value="<?php echo set_value('loan_program', $member_loan->loan_program);?>">
          
          </div>
          <div class="form-group view-only">
            <label for="loan_category">Loan Category</label>
            
             <input type="text" class="form-control" readonly="" name="loan_category" id="loan_category" placeholder="" value="<?php echo set_value('loan_category', $member_loan->loan_category);?>">
          
          </div>
         
           <div class="form-group">
            <label for="LoanTermId">Loan Term</label>
            <input type="text" name="loan_term" class="form-control"  readonly="" id="loan_term" value="<?php echo set_value('loan_term', $member_loan->loan_term);?>">
             
          
          </div>
         
          <div class="form-group">
            <label for="LifeInsuranceId">Life Insurance</label>
            <input type="text" name="life_insurance" readonly="" class="form-control" id="life_insurance" value="<?php echo set_value('life_insurance', $member_loan->life_insurance);?>">
            
          </div>
          



        </div>
       
       <div class="col-md-6">
          <div class="form-group view-only">
            <label for="date_of_filing">Filing Date</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker" name="date_of_filing" id="date_of_filing" placeholder="Enter Filing Date" readonly="" value="<?php echo set_value('date_of_filing', $member_loan->date_of_filing);?>">
            
            </div>
            <!-- /.input group -->
        </div>
          <div class="form-group view-only">
            <label for="min_loanable_amount">Minimum Loanable Amount</label>
            <input type="text" class="form-control deci" readonly="" name="min_loanable_amount" id="min_loanable_amount" placeholder="" value="<?php echo set_value('min_loanable_amount', $member_loan->min_loanable_amount);?>">
          </div>
          <div class="form-group view-only">
            <label for="max_loanable_amount">Maximum Loanable Amount</label>
            <input type="text" class="form-control deci" readonly="" name="max_loanable_amount" id="max_loanable_amount" placeholder="" value="<?php echo set_value('max_loanable_amount', $member_loan->max_loanable_amount);?>">
          </div>

          <div class="form-group view-only">
            <label for="ModeOfPaymentId">Mode of Payment</label>
            <input type="text" class="form-control" readonly="" name="mode_of_payment" id="mode_of_payment" value="<?php echo set_value('mode_of_payment', $member_loan->mode_of_payment);?>">
            
          </div>
         
          <div class="form-group">
            <label for="loan_amount">Loan Amount</label>
            <input type="text" name="loan_amount" readonly="" class="form-control deci"  id="loan_amount" placeholder="Enter Loan Amount" value="<?php echo set_value('loan_amount', $member_loan->loan_amount);?>" >
          </div>



        </div>
      </div>
      <!-- /.row -->
    </div>
    
    <div class="box-footer">
    
    

    
  </div>

  </div>

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Computation of Cash Out</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
   
    <div class="box-body view-only" style="">
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
          <div class="col-md-6"></div>
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
   
    <div class="box-body view-only" style="">
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
          <div class="col-md-6"></div>
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
   
    <div class="box-body view-only" style="">
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
          <div class="col-md-6"></div>
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
   
    <div class="box-body view-only" style="">
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
          <div class="col-md-6"></div>
          <div class="col-md-6 pull-right total-val">Total: Php <span class="deci" id="amortization_due_display"><?php echo ($member_loan->amortization_due) ? nf($member_loan->amortization_due) : '0.00'; ?></span></div>
        </div>
      </div>
  </div>

  

</div>

</div>



<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

<div class="box-footer">
    
    <button type="button" data-toggle="modal" data-target="#modal-default-approval" class="btn btn-primary btn-lg" data-action="Approved" data-message="Are you sure you want to approved this loan application?">Approved</button>
    <button type="button" data-toggle="modal" data-target="#modal-default-approval" class="btn btn-danger btn-lg" data-action="Disapproved" data-message="Are you sure you want to disapproved this loan application?">Disapproved</button>
    <a href="<?php echo site_url('p3_verification/my_queue')?>" class="btn btn-default btn-lg">Back</a>

    
  </div>

</div>
</div>
</div>

<div class="modal fade" id="modal-default-approval" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Please Confirm your Action</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <?php echo $form_url; ?>        
        <button type="submit" name="btn_action" id="btn_action" value="" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <?php echo form_close(); ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

