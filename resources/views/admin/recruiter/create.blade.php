@extends('admin.templates.app')
@section('title', "Création d'une offre d'emploi")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Création d'une offre d'emploi</h2>
            </div>
            <div class="col-lg-12">
                @include('alert')
                <form class="form" action="{{ route('recruiter.offer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="image">Image de l'offre</label>
                                <input type="file" class="form-control" class="single-input-secondary" name="image" id="image"
                                    placeholder="Image de l'offre" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">Titre de l'offre @include('required')</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Titre de votre offre'"
                                    placeholder="Titre de votre offre" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Descriptif de l'offre @include('required')</label>
                                <textarea class="form-control w-100" name="description" id="description" cols="30" rows="9"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Descriptif de l\'offre'"
                                    placeholder="Descriptif de l\'offre" required></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="end_at">Date de clôture @include('required')</label>
                                <input type="date" class="form-control" name="end_at" id="end_at"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date de clôture'"
                                    placeholder="Date de clôture" required>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="school">Quelle est le niveau d'étude requis ?</label>
                                <select class="form-control" name="school" id="school" required>
                                    <option>Universitaire</option>
                                    <option>École secondaire</option>
                                    <option>École Primaire</option>
                                    <option>Avec ou sans diplôme</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="skills">Compétences @include('required')</label>
                                <textarea class="form-control w-100" name="skills" id="skills" cols="30" rows="9"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'compétences requises séparées par une virgule'"
                                    placeholder="compétences requises séparées par une virgule" required></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="category_id">Catégorie @include('required')</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Poster</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
