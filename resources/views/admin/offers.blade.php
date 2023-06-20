@extends('admin.templates.app')
@section('title', 'Offre d\'emploi')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des offres d'emploi disponibles</h4>
                </div>
                <div class="card-body">
                    @include('alert')
                    <div class="table-responsive table-hover">
                        <table class="table">
                            <thead class=" text-primary">
                                <th></th>
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
                                <th class="text-right">
                                    État
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>
                                            <img class="img-fluid" width="150px"
                                                src="{{ asset('assets/img/icon/' . $offer->picture) }}"
                                                alt="{{ $offer->picture }}">
                                        </td>
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
                                        <td>
                                            {{ $offer->is_valid ? 'Valide' : 'En attente' }}
                                        </td>
                                        <td class="text-center">
                                            @if (!$offer->is_valid)
                                                <a href="{{ route('admin.offers.check', $offer->id) }}"
                                                    class="btn btn-success btn-round mb-1">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.offers.show', $offer->id) }}"
                                                class="btn btn-info btn-round">
                                                <i class="fa fa-eye"></i>
                                            </a>
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
