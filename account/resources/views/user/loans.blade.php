@extends('layouts.dash2')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
    
      <div class="toolbar" id="kt_toolbar">
          <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
              <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                  <h1 class="text-dark fw-bolder my-1 fs-2">Transactions</h1>
                  <ul class="breadcrumb fw-semibold fs-base my-1">
                      <li class="breadcrumb-item text-muted">
                          <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard </a>
                      </li>
                      <li class="breadcrumb-item text-dark">Transactions</li>
                  </ul>
              </div>
              <div class="d-flex align-items-center flex-nowrap text-nowrap py-1 mb-10">
                  <button data-bs-toggle="modal" data-bs-target="#filter" class="btn btn-white text-dark me-4"><i class="fal fa-filter-list"></i> Filter</button>
                  <button data-bs-toggle="modal" data-bs-target="#export" class="btn btn-dark"><i class="fal fa-file-export"></i> Export</button>
              </div>
          </div>
          <div class="post fs-6 d-flex flex-column-fluid min-vh-100" id="kt_post">
              <div class="container">
                  <div class="row g-xl-8">
                      <div wire:ignore.self class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h3 class="modal-title">Filter Transaction</h3>
                                      <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                          <span class="svg-icon svg-icon-1">
                                              <i class="fal fa-times"></i>
                                          </span>
                                      </div>
                                  </div>
                                  <div class="modal-body">
                                      <div class="fv-row mb-6">
                                          <label class="form-label fs-6 fw-bolder text-dark">Date Range</label>
                                          <input class="form-control form-control-lg form-control-solid" placeholder="Pick date rage" value="1691490869836 - 1689485801227" name="date" id="range" onchange="this.dispatchEvent(new InputEvent('input'))" wire:model="date">
                                      </div>
                                      <div class="fv-row mb-6">
                                          <label class="form-label fs-6 fw-bolder text-dark">Status</label>
                                          <select class="form-select form-select-solid" wire:model="status">
                                              <option value="">Select status</option>
                                              <option value="COMPLETED">Completed</option>
                                              <option value="PENDING">Pending</option>
                                          </select>
                                      </div>
                                      <div class="fv-row mb-6">
                                          <label class="form-label fs-6 fw-bolder text-dark">Sort by</label>
                                          <select class="form-select form-select-solid" wire:model="orderBy">
                                              <option value="asc">ASC</option>
                                              <option value="desc">DESC</option>
                                          </select>
                                      </div>
                                      <div class="fv-row mb-6">
                                          <label class="form-label fs-6 fw-bolder text-dark">Per page</label>
                                          <select class="form-select form-select-solid" wire:model="perPage">
                                              <option value="10">10</option>
                                              <option value="25">25</option>
                                              <option value="50">50</option>
                                              <option value="100">100</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div wire:ignore.self class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h3 class="modal-title">Export Transactions</h3>
                                      <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                          <span class="svg-icon svg-icon-1">
                                              <i class="fal fa-times"></i>
                                          </span>
                                      </div>
                                  </div>
                                  <form wire:submit.prevent="save(Object.fromEntries(new FormData($event.target)))">
                                      <div class="modal-body">
                                          <input type="hidden" name="_token" value="qNuplysOgRVxc2sjYh0qmlz5SYKUtCZFmPKq0wJO">                                        <div class="fv-row mb-6">
                                              <label class="form-label fs-6 fw-bolder text-dark">File Format</label>
                                              <select class="form-select form-select-solid" name="exportType" required>
                                                  <option value="">Select file type</option>
                                                  <option value="csv">CSV</option>
                                                  <option value="excel">Excel</option>
                                              </select>
                                          </div>
                                                                                  <div class="fv-row mb-6">
                                              <label class="form-label fs-6 fw-bolder text-dark">Export as</label>
                                              <select class="form-select form-select-solid" name="exportAs" required>
                                                  <option value="">How do you want to receive this file?</option>
                                                  <option value="download">Download file</option>
                                                  <option value="email">Send file to email</option>
                                              </select>
                                          </div>
                                                                              </div>
                                      <div class="modal-footer">
                                          <button class="btn btn-block btn-primary" type="submit"><i class="fal fa-file-export"></i>
                                              <span wire:loading.remove wire:target="save">Export</span>
                                              <span wire:loading wire:target="save">Exporting file...</span>
                                          </button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                          <div class="d-flex justify-content-center flex-column me-3">
                              <div class="col-md-12">
                                  <div class="input-group input-group-solid mb-5 rounded-4">
                                      <span class="input-group-text" id="basic-addon1"><i class="fal fa-search"></i></span>
                                      <input type="search" class="form-control form-control-solid text-dark" wire:model="search" placeholder="Transaction reference" />
                                  </div>
                              </div>
                          </div>
                                                  <div class="" wire:loading.class.delay="opacity-50" wire:target="search, status, orderBy, perPage, date, loadMore">
                              <div class="card-body pt-0">
                                  <div class="table-responsive">
                                      <table class="table align-middle table-row-bordered table-row-gray-300 gy-5 gs-7" id="kt_datatable_example_5">
                                          <thead>
                                              <tr class="text-start text-dark fw-bolder fs-7 text-uppercase px-7">
                                                  <th></th>
                                                  <th class="min-w-150px">Amount</th>
                                                  <th class="min-w-50px">Purpose</th>
                                                  <th class="min-w-50px">Duration</th>
                                                  <th class="min-w-50px">Status</th>
                                                  <th class="min-w-200px">Date Applied</th>
                                              </tr>
                                              <!--end::Table row-->
                                          </thead>
              <tbody class="fw-semibold text-dark fs-6">
                @foreach($loans as $loan)
              <tr class="cursor-pointer" id="kt_trx_110853544343568433_button">
             <td>
              
            <div class="symbol symbol-40px symbol-circle me-5">
           <div class="symbol-label fs-3 fw-bolder text-dark">
                                  <i class="fal fa-plus"></i>
           </div>
          </div>
        
      </td>
      <td>{{ $settings->currency }}{{$loan->amount }} {{ $settings->s_currency }}</td>

      <td>{{ $loan->purpose }} </td>
      <td>{{ $loan->duration }}</td>
      @if($loan->active =='Processed')
          <td><span class="badge badge-pill badge-success badge-sm">{{ $loan->active }}</span></td>
          @else
          <td><span class="badge badge-pill badge-warning badge-sm">{{$loan->active }}</span></td>
          @endif
          
         
      <td>{{ \Carbon\Carbon::parse($loan->created_at)->toDayDateTimeString() }}</td>
  </tr>
  @endforeach
  
                                          </tbody>
                                      </table>
                                </div>
                              </div>
                          </div>
                     </div>
                  </div>
              </div>
  
            
          </div>
      </div>
  </div>   </div>
      

@endsection
