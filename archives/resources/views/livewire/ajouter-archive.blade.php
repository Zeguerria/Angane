<div>

    <div class="card">
        <div class="card-body">
            <form action="" wire:submit.prevent="save">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>N° Ordre</label>
                            <input type="text" name="code" wire:model="archive.code" required>
                        </div>
                        @error('archive.code')
                            <span class="alert alert-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Référence</label>
                            <input type="text" name="libelle" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Objet</label>
                            <input type="text" name="objet" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Type de Courrier</label>
                            <select class="select" name="type_id">
                                <option>Choose Tax</option>
                                <option>2%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category de courier</label>
                            <select class="select" name="categorie_id">
                                <option>Choose Tax</option>
                                <option>2%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom Emetteur</label>
                            <input type="text" name="emetteur" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Date Emission</label>
                            <input type="date" class="form-control" name="date_emission" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom Destinataire</label>
                            <input type="text" name="destinataire" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Rate Reception</label>
                            <input type="date"  class="form-control" name="date_reception" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Nom Receveur (Accusé de réception)</label>
                            <input type="text" name="receveur" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ampliation</label>
                            <input type="text" name="receveur" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="desc"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Document à archiver</label>
                            <div class="image-upload">
                                <input type="file" required name="fichier">
                                <div class="image-uploads">
                                    <img src="assets/img/icons/upload.svg" alt="img">
                                    <h4>Déplacer le fichier ici ou cliquez pour en selectionner un</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">VALIDER</button>
                        <a href="/Liste-Archivage" class="btn btn-cancel">RETOURNER VERS LA LISTE</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
