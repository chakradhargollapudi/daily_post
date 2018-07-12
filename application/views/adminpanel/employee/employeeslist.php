@extends('adminpanel/layouts.app')
@section('pageheadertitle')
Component List
@endsection
@section('pagetitle')
@endsection

@section('pagecontent')
  <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <h3 class="m-portlet__head-text">
            Projects List
          </h3>
        </div>
      </div>
    </div>
    <div class="m-portlet__body">
      {{ csrf_field() }}
          <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
              <div class="col-xl-8 order-2 order-xl-1">
                <div class="form-group m-form__group row align-items-center">
                  @if(!empty(Session::get('is_admin')) && Session::get('is_admin') ==1) 
                  <div class="col-md-4">
                    <div class="m-form__group m-form__group--inline">
                      <div class="m-form__label">
                        <label>
                          Company:
                        </label>
                      </div>
                      <div class="m-form__control">
                        <select class="form-control m-select2" id="m_select2_2" name="company_id" placeholder="Select Category">
                          <option value="0">All</option>
                          @if(isset($companies_list) && count($companies_list) >0)
                            @foreach($companies_list as $comkey=>$comval)
                          <option value="{{$comval->company_id}}" <?=(isset($company_selected) && $company_selected ==$comval->company_id)?'selected':''?>>{{$comval->company_name}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="d-md-none m--margin-bottom-10"></div>
                  </div>
                  @endif
                  <div class="col-md-4">
                    <div class="m-form__group m-form__group--inline">
                      <div class="m-form__label">
                        <label class="m-label m-label--single">
                          Category:
                        </label>
                      </div>
                      <div class="m-form__control">
                        <select class="form-control m-select2" id="m_select2_1" name="category_id" placeholder="Select Category">
                            <option value="0">All</option>
                            @if(isset($categories_list) && count($categories_list) >0)
                              @foreach($categories_list as $ckey=>$cval)
                                <option value="{{$cval->category_id}}" <?=(isset($category_selected) && $category_selected ==$cval->category_id )?'selected':''?>>{{$cval->category_type}}</option>
                              @endforeach
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="d-md-none m--margin-bottom-10"></div>
                  </div>
                  <div class="col-md-4">
                    <div class="m-input-icon m-input-icon--left">
                     <button type="submit" class="btn btn-info">
                      Search
                     </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="addproject" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                  <span>
                    <i class="la la-plus"></i>
                    <span>
                      New Project
                    </span>
                  </span>
                </a>
                <div class="m-separator m-separator--dashed d-xl-none"></div>
              </div>
            </div>
          </div>
          <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30 collapse show projectstatusactions" id="m_datatable_group_action_form">
              <div class="row align-items-center">
                <div class="col-xl-12">
                  <div class="m-form__group m-form__group--inline">
                    <div class="m-form__control">
                      <div class="btn-toolbar">
                        &nbsp;&nbsp;&nbsp;
                        <div class="dropdown">
                          <button type="button" class="btn btn-accent btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Update status
                          </button>
                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -136px, 0px);">
                            <a class="dropdown-item projectstatus" href="javascript:" projectstatus="1">
                              Active
                            </a>
                            <a class="dropdown-item projectstatus" href="javascript:"  projectstatus="0">
                              Inactive
                            </a>
                            @if(!empty(Session::get('is_admin')) && Session::get('is_admin') ==1) 
                            <a class="dropdown-item" href="javascript:" id="qcreview" reviewstatus="2">
                              QC
                            </a>
                            <a class="dropdown-item" href="javascript:" id="globalreview" reviewstatus="3">
                              Global
                            </a>
                            <a class="dropdown-item projectfeature" href="javascript:" featuredstatus="1">
                              Featured
                            </a>
                            <a class="dropdown-item projectfeature" href="javascript:" featuredstatus="0">
                              Not Featured
                            </a>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <?= Form::close(); ?>
      <!--end: Search Form -->
      <!--begin: Datatable -->
       <table class="table table-condensed" style="border-collapse:collapse;">
          <thead>
              <tr>
                <th>Check</th>
                <th>Project ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Company</th>
                <th>Project Status</th>
                <th>Review Status</th>
                <th>Is Featured</th>
                <th>Placement</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
             @if(isset($projects_list) && count($projects_list)>0)
                @foreach($projects_list as $pkey=>$pval)
                  <tr data-toggle="collapse" data-target="#demo{{$pval->project_id}}"  pid="{{$pval->project_id}}" class="accordion-toggle projecttab">
                      <td class="projectcheckedtd"><input type="checkbox" name="project_check[]" value="{{$pval->project_id}}" class="projectchecked"></td>
                      <td>{{$pval->project_code}}</td>
                      <td style="max-width: 100px;"><p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$pval->project_title}}</p></td>
                      <td>
                       {{$pval->category_type}}
                      </td>
                      <td>
                         {{$pval->company_name}}
                      </td>
                      <td>
                         {{$pval->projectstatus}}
                      </td>
                      <td>
                         {{$pval->reviewstatus}}
                      </td>
                      <td>
                         {{$pval->isfeatured}}
                      </td>
                      <td>
                         {{$pval->placement}}
                      </td>
                      <td>
                         <a href="editprojectdetails/{{$pval->project_id}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit project"><i class="fa fa-edit"></i></a>
                         <a href="addcomponents/{{$pval->project_id}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add Component"><i class="fa fa-plus"></i></a>
                         <a href="addreferences/{{$pval->project_id}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Add References"><i class="fa fa-book"></i></a>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="12" class="hiddenRow">
                      <div class="accordian-body collapse" id="demo{{$pval->project_id}}"> 
                          
                      </div> 
                    </td>
                  </tr>
             @endforeach  
            @endif
          </tbody>
       </table>
      <!--end: Datatable -->
    </div>
  </div>
@endsection
@section('jquerycode')
<!--<script src="{!!asset('assets/demo/default/custom/crud/metronic-datatable/base/html-table.js') !!}" type="text/javascript"></script>-->
<script type="text/javascript">
  $("#qcreview").click(function(){
    var status = $(this).attr("reviewstatus");
    var action = "changetoqc";
    
      updateprojectstatus(status,action);
    
    
  });
  $("#globalreview").click(function(){
    var status = $(this).attr("reviewstatus");
    var action = "changetoglobal";
    updateprojectstatus(status,action);
  });

  $(".projectstatus").click(function(){
    var status = $(this).attr("projectstatus");
    var action = "changeprojectstatus";
    updateprojectstatus(status,action);
  });

  $(".projectfeature").click(function(){
    var status = $(this).attr("featuredstatus");
    var action = "changeprojectfeatured";
    updateprojectstatus(status,action);
  });
  function updateprojectstatus(status,action){
     var projectids = [];
      $('input.projectchecked:checkbox:checked').each(function () {
          projectids.push($(this).val());
     });
     if(projectids ==""){
      alert('Please select atleast one project');
      return false;
     }
     if(confirm("Do you Really want to update")){
         var token = '<?=csrf_token()?>';
         $.ajax({
              type: "POST",
              url: '/admin/updateprojectstatus',
              data: {'_token':token,action:action,projectids:projectids,status:status},
              success: function( msg ) { //alert(msg)
                swal('updated Successfully');
                location.reload();
              }
          });
      }
  }
  $(".projecttab").click(function(){
    var pid = $(this).attr("pid"); //alert(pid)
    var token = '<?=csrf_token()?>';
     $.ajax({
        type: "POST",
        url: 'referenceslist',
        data: {'_token':token,project_id:pid},
        success: function(msg) { //alert(msg)
           $("#demo"+pid).html(msg);
        }
     });
  })
</script>
@endsection
