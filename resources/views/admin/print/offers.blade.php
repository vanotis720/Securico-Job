@extends('admin.print.template')
@section('title', 'Liste des offres d\'emploi')
@section('containt')
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th>#</th>
                <th>
                    Titre
                </th>
                <th>
                    Description
                </th>
                <th>
                    Catégorie
                </th>
                <th>
                    Date de clôture
                </th>
                <th>
                    Recruteur
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $offer)
                <tr>
                    <td>
                        {{ $offer->id }}
                    </td>
                    <td>
                        {{ $offer->title }}
                    </td>
                    <td>
                        {!! $offer->description !!}
                    </td>
                    <td>
                        {{ $offer->category->title }}
                    </td>
                    <td>
                        {{ $offer->end_at }}
                    </td>
                    <td>
                        {{ $offer->user->name }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
