@extends('back.layouts.app')

@section('content')
    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row mt-2">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h4 class="titre">Ajouter une Sous Tâche</h4>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        @if($from==1)

                            <form action="{{route('subtask.store',$task->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Ajouter une Sous Tâche</h4>

                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label text-right">Titre</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control"  name="title"
                                                   placeholder="Saisir le titre du tâche" required>
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Tâche</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control"  name="project"
                                                   value="{{$task->title}}" readonly>
                                            <input type="hidden" name="task_id" value="{{$task->id}}">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label text-right">Affecter à</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="user_id">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Prioriter</label>
                                        <div class="col-sm-3">
                                            <select class="form-control"  name="priority_id">
                                                @foreach($priorities as $priorit)
                                                    <option value="{{$priorit->id}}">{{$priorit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label text-right">Offre Service</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="offreS" >
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Estimation Horaire Service</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="estimationS" >
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Prix d'heure</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="prix" >
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label text-right">Offre Produit</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="offreP" >
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Estimation Produit</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="estimationP" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" rows="5" placeholder="Entrer ..." name="description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-12 control-label">Ajouter des fichiers (peut en joindre plusieurs):</label>
                                        <div class="col-sm-4">
                                            <input multiple="multiple" name="files[]" type="file" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary float-right m-1">Sauvegarder
                                        </button>
                                        <a href="{{route('task.show',$task->id)}}" class="btn btn-primary float-right m-1">Annuler</a>
                                    </div>
                                </div>
                            </form>
                        @elseif($from==2)

                            <form action="{{route('subtask.update',$subtask->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Modifier la Sous tâche</h4>

                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label">Titre</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control"  name="title"
                                                   placeholder="Saisir le titre du tache" value="{{$subtask->title}}" required>
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label">Tâche</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control"  name="tache"
                                                   value="{{$subtask->task->title}}" readonly>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label">Affecter à</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="user_id">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}" @if($subtask->user_id ==$user->id) selected @endif>{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label">Prioriter</label>
                                        <div class="col-sm-3">
                                            <select class="form-control"  name="priority_id">
                                                @foreach($priorities as $priorit)
                                                    <option value="{{$priorit->id}}" @if($subtask->priority_id ==$priorit->id) selected @endif>{{$priorit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label text-right">Offre Service</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="offreS" value="{{$subtask->offreS}}">
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Estimation Horaire Service</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="estimationS" value="{{$subtask->estimationS}}">
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Prix d'heure</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="prix" value="{{$subtask->prix}}">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputUser" class="col-sm-2 control-label text-right">Offre Produit</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="offreP" value="{{$subtask->offreP}}">
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Estimation Produit</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="estimationP" value="{{$subtask->estimationP}}">
                                        </div>

                                        <label for="inputUser" class="col-sm-2 control-label text-right">Côut Réel Produit</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="1" class="form-control" name="cout_realP" value="{{$subtask->cout_realP}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">Description</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" rows="5" placeholder="Entrer ..." name="description" required>{{$subtask->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label class="col-sm-12 control-label">Ajouter des fichiers (peut en joindre plusieurs):</label>
                                        <div class="col-sm-4">
                                            <input multiple="multiple" name="files[]" type="file" class="form-control">
                                        </div>
                                    </div>


                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary float-right m-1">Sauvegarder
                                        </button>
                                        <a href="{{route('task.show',$subtask->task_id)}}" class="btn btn-primary float-right m-1">Annuler</a>
                                    </div>
                                </div>
                            </form>
                        @endif


                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection
@section('javascript')
@endsection

