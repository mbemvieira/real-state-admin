@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="title">Título *</label>
    <input type="text" 
        class="form-control"
        name="title" id="title"
        placeholder="Título"
        maxlength="100"
        value="{{ $property->title or '' }}"
    >
</div>

<div class="form-group">
    <label for="code">Código *</label>
    <input type="text" 
        class="form-control"
        name="code" id="code"
        placeholder="Código"
        maxlength="20"
        value="{{ $property->code or '' }}"
    >
</div>

<div class="form-group">
    <label for="type">Tipo do imóvel *</label>
    <select class="form-control" name="type" id="type">
        <option value="a"{{ isset($property) && $property->type == 'a' ? ' selected' : '' }}>
            Apartamento
        </option>
        <option value="c"{{ isset($property) && $property->type == 'c' ? ' selected' : '' }}>
            Casa
        </option>
    </select>
</div>

<hr>

<div class="form-group">
    <label for="address_cep">CEP</label>
    <input type="text" 
        class="form-control"
        name="address_cep" id="address_cep"
        placeholder="CEP"
        maxlength="10"
        value="{{ $property->address_cep or '' }}"
    >
</div>

<div class="form-group">
    <label for="address_street">Endereço</label>
    <input type="text" 
        class="form-control"
        name="address_street" id="address_street"
        placeholder="Endereço"
        maxlength="50"
        value="{{ $property->address_street or '' }}"
    >
</div>

<div class="form-group">
    <label for="address_number">Número</label>
    <input type="text" 
        class="form-control"
        name="address_number" id="address_number"
        placeholder="Número"
        maxlength="5"
        value="{{ $property->address_number or '' }}"
    >
</div>

<div class="form-group">
    <label for="address_neighbour">Bairro</label>
    <input type="text" 
        class="form-control"
        name="address_neighbour" id="address_neighbour"
        placeholder="Bairro"
        maxlength="20"
        value="{{ $property->address_neighbour or '' }}"
    >
</div>

<div class="form-group">
    <label for="address_complements">Complementos</label>
    <input type="text" 
        class="form-control"
        name="address_complements" id="address_complements"
        placeholder="Complementos"
        maxlength="10"
        value="{{ $property->address_complements or '' }}"
    >
</div>

<div class="form-group">
    <label for="address_city">Cidade</label>
    <input type="text" 
        class="form-control"
        name="address_city" id="address_city"
        placeholder="Cidade"
        maxlength="30"
        value="{{ $property->address_city or '' }}"
    >
</div>

<div class="form-group">
    <label for="address_state">Estado</label>
    <input type="text" 
        class="form-control"
        name="address_state" id="address_state"
        placeholder="Estado"
        maxlength="20"
        value="{{ $property->address_state or '' }}"
    >
</div>

<hr>

<div class="form-group">
    <label for="price">Preço</label>
    <input type="text" 
        class="form-control"
        name="price" id="price"
        placeholder="Preço"
        maxlength="12"
        value="{{ $property->price or '' }}"
    >
</div>

<div class="form-group">
    <label for="area">Área</label>
    <input type="text" 
        class="form-control"
        name="area" id="area"
        placeholder="Área"
        maxlength="12"
        value="{{ $property->area or '' }}"
    >
</div>

<div class="form-group">
    <label for="number_bedrooms">Número de Quartos</label>
    <input type="text" 
        class="form-control"
        name="number_bedrooms" id="number_bedrooms"
        placeholder="0"
        maxlength="1"
        value="{{ $property->number_bedrooms or '' }}"
    >
</div>

<div class="form-group">
    <label for="number_suite">Número de Suítes</label>
    <input type="text" 
        class="form-control"
        name="number_suite" id="number_suite"
        placeholder="0"
        maxlength="1"
        value="{{ $property->number_suite or '' }}"
    >
</div>

<div class="form-group">
    <label for="number_bathrooms">Número de Banheiros</label>
    <input type="text" 
        class="form-control"
        name="number_bathrooms" id="number_bathrooms"
        placeholder="0"
        maxlength="1"
        value="{{ $property->number_bathrooms or '' }}"
    >
</div>

<div class="form-group">
    <label for="number_rooms">Número de Salas</label>
    <input type="text" 
        class="form-control"
        name="number_rooms" id="number_rooms"
        placeholder="0"
        maxlength="1"
        value="{{ $property->number_rooms or '' }}"
    >
</div>

<div class="form-group">
    <label for="number_parking_places">Número de Vagas de Garagem</label>
    <input type="text" 
        class="form-control"
        name="number_parking_places" id="number_parking_places"
        placeholder="0"
        maxlength="1"
        value="{{ $property->number_parking_places or '' }}"
    >
</div>

<hr>

<div class="form-group">
    <label for="description">Descrição</label>
    <textarea rows="2"
        class="form-control"
        name="description" id="description"
        placeholder="Descrição do imóvel..."
        maxlength="300"
    >
        {{ $property->description or '' }}
    </textarea>
</div>

<a type="button" class="btn btn-default" href="{{ route('properties.index') }}">
    Voltar
</a>
<button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>