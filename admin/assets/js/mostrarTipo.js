const selTipo = document.getElementById('selTipo')
const seleccioneTalla = document.getElementById('seleccioneTalla')

selTipo.addEventListener('change', (e)=>{
    e.preventDefault()
    let tipo = selTipo.value
    if(tipo === '1' || tipo === '2'){
        seleccioneTalla.innerHTML = `<h3>Tallas </h3>
        <span>Porfavor selecciones las tallas y respectivas cantidades disponibles para este producto</span><br>`

        for (let i = 6; i < 18; i+=2) {
            seleccioneTalla.innerHTML += `
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="talla${i}" name="talla${i}">
                <label class="form-check-label" for="talla${i}">${i}</label>
                <select class="form-control" name="cantidadTalla${i}">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>`
        }

        seleccioneTalla.innerHTML += `<select class="form-control" name="horma" required>
            <option value="">Horma</option>
            <option value="mujer">Mujer</option>
            <option value="hombre">Hombre</option>
            <option value="niño">UNISEX</option>
        </select>`
    }else if(tipo === ''){
        seleccioneTalla.innerHTML = `<h3>Tallas para Ropa</h3>
        <span>Porfavor selecciones las tallas y respectivas cantidades disponibles para este producto</span><br>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="talla5anos" name="talla5anos">
            <label class="form-check-label" for="talla5anos">5 años</label>
            <select class="form-control" name="catidadTalla5anos">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="talla10anos" name="talla10anos">
            <label class="form-check-label" for="talla10anos">10 años</label>
            <select class="form-control" name="catidadTalla10anos">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="talla14anos" name="talla14anos">
            <label class="form-check-label" for="talla14anos">14 años</label>
            <select class="form-control" name="catidadTalla14anos">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="tallaS" name="tallaS">
            <label class="form-check-label" for="tallaS">S</label>
            <select class="form-control" name="catidadTallaS">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="tallaM" name="tallaM">
            <label class="form-check-label" for="tallaM">M</label>
            <select class="form-control" name="catidadTallaM">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="tallaL" name="tallaL">
            <label class="form-check-label" for="tallaL">L</label>
            <select class="form-control" name="catidadTallaL">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="tallaXL" name="tallaXL">
            <label class="form-check-label" for="tallaXL">XL</label>
            <select class="form-control" name="catidadTallaXL">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="TallaUnica" name="TallaUnica">
            <label class="form-check-label" for="TallaUnica">UNICA</label>
            <select class="form-control" name="catidadTallaUnica">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

            <select class="form-control" name="horma" required>
                <option value="">Horma</option>
                <option value="mujer">Mujer</option>
                <option value="hombre">Hombre</option>
                <option value="niño">UNISEX</option>
            </select>`
    }else if(tipo === ''){
        seleccioneTalla.innerHTML = `<h3>Tallas para Calzado</h3>
        <span>Porfavor selecciones las tallas y respectivas cantidades disponibles para este producto</span><br>`
        for (let i = 2; i < 39; i+=2) {
            seleccioneTalla.innerHTML += `
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="talla${i}" name="talla${i}">
                <label class="form-check-label" for="talla${i}">${i}</label>
                <select class="form-control" name="cantidadTalla${i}">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>`
        }
        for (let i = 19; i < 46; i++) {
            seleccioneTalla.innerHTML += `
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="talla${i}" name="talla${i}">
                <label class="form-check-label" for="talla${i}">${i}</label>
                <select class="form-control" name="catidadTalla${i}">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>`
        }

        seleccioneTalla.innerHTML += ` 
            <select class="form-control" name="horma" required>
                <option value="">Horma</option>
                <option value="mujer">Mujer</option>
                <option value="hombre">Hombre</option>
                <option value="niño">UNISEX</option>
            </select>`
        
    }else{
        seleccioneTalla.innerHTML = ''
        seleccioneTalla.innerHTML = `<input type="text" class="form-control" name="horma" value="ninguna" required>`
    }
})
