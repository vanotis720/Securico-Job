@extends('admin.templates.app')
@section('title', 'Administration')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-paper text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Offres d'emplois</p>
                                <p class="card-title">
                                    {{ count($offers) }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i>
                        Mis à jour maintenant
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Offres d'emploi récentes</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-hover">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Titre
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Date de clôture
                                </th>
                                <th class="text-right">
                                    Recruteur
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.offers.show', $offer->id) }}">
                                                {{ $offer->title }}
                                            </a>
                                        </td>
                                        <td>
                                            {!! Str::limit($offer->description, 50) !!}
                                        </td>
                                        <td>
                                            {{ $offer->end_at }}
                                        </td>
                                        <td class="text-right">
                                            {{ $offer->user->name }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
