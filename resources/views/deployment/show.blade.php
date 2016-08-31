@extends('layouts.dashboard')

@section('content')
    @if (!empty($deployment->reason))
        <p><strong>{{ trans('deployments.reason') }}</strong>: {{ $deployment->reason }}</p>
    @endif
    <div class="row">
        <div class="col-xs-12" id="{{ $deployment->repo_failure ? '' : 'repository_error' }}">
            <div class="callout callout-danger">
                <h4><i class="icon ion ion-close"></i> {{ trans('deployments.repo_failure_head') }}</h4>
                <p>{{ trans('deployments.repo_failure') }}</p>
            </div>
        </div>

        @foreach($deployment->steps as $step)
        <div class="col-xs-12">
            <div class="box deploy-step">
                <div class="box-header">
                    <h3 class="box-title"><i class="ion ion-code"></i> <span>{{ $step->name }}</span></h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="30%">{{ trans('deployments.server') }}</th>
                                <th width="20%">{{ trans('deployments.status') }}</th>
                                <th width="15%">{{ trans('deployments.started') }}</th>
                                <th width="15%">{{ trans('deployments.finished') }}</th>
                                <th width="10%">{{ trans('deployments.duration') }}</th>
                                <th width="10%">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="step_{{ $step->id }}">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @include('deployment.log')
@stop

@push('javascript')
    <script type="text/javascript">
        new app.DeploymentView();
        app.Deployment.add({!! $output !!});

        app.project_id = {{ $deployment->project_id }};
    </script>
@endpush

@push('templates')
    <script type="text/template" id="log-template">
        <td><%- server.name %></td>
        <td>
             <span class="label label-<%- status_css %>"><i class="ion ion-<%- icon_css %>"></i> <span><%- status %></span></span>
        </td>
        <td>
            <% if (formatted_start_time) { %>
                <%- formatted_start_time %>
            <% } else { %>
                {{ trans('app.not_applicable') }}
            <% } %>
        </td>
        <td>
            <% if (formatted_end_time) { %>
                <%- formatted_end_time %>
            <% } else { %>
                {{ trans('app.not_applicable') }}
            <% } %>
        </td>
        <td>
         <% if (runtime !== null) { %>
                <%- runtime %>
            <% } else { %>
                {{ trans('app.not_applicable') }}
            <% } %>
            </td>
        <td>
            <div class="btn-group pull-right">
                <% if (output !== null) { %>
                    <button type="button" class="btn btn-default" title="{{ trans('deployments.output') }}" id="log_<%- id %>" data-toggle="modal" data-backdrop="static" data-target="#log"><i class="ion ion-ios-copy-outline"></i></button>
                <% } %>
            </div>
        </td>
    </script>
@endpush
