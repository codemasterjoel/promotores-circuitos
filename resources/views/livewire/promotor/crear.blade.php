<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex items-center justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex items-center justify-center">
                        <img src="{{asset('img/logo consulta.png')}}" class="w-52">
                    </div>
                    @if(session()->has('promotorGuardado')== 'success')
                        @include('livewire.components.success')
                    @endif
                    @if(session()->has('promotorEliminado')== 'success')
                        @include('livewire.components.delete')
                    @endif
                    @if(session()->has('yaregistrado')== 'success')
                        @include('livewire.components.yaregistrado')
                    @endif
                    @if(session()->has('noregistrado')== 'success')
                        @include('livewire.components.noregistrado')
                    @endif
                    <h3 class="text-2xl text-cyan-400 font-extrabold text-center">REGISTRAR EQUIPO PROMOTOR</h3>
                    <h2 class="text-2xl text-cyan-800 font-semibold text-center">Comuna: {{$nombre}}</h2>
                    <form>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-0">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                        <div class="flex items-center justify-center py-4"> {{-- campo cedula --}}
                                            <div class="w-full rounded-lg bg-gray-500">
                                                <div class="flex">
                                                    <input wire:model="cedula" type="number" class="w-full bg-white rounded-l-lg pl-2 border text-base font-semibold outline-0 border-slate-200" />
                                                    <input type="button" wire:click="consultarPromotor()" value="Consultar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-semibold transition-colors">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                        <div class="flex items-center justify-center py-4">
                                            <input wire:click="guardarPromotor" type="button" value="Guardar" class="bg-gradient-to-r from-cyan-400 to-cyan-600 p-2 rounded-lg text-white font-semibold transition-colors">
                                        </div>
                                    </div>
                                </div>
                                @if ($formulario)
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12"> {{-- campo Nombre y Apellido --}}
                                            <div class="relative flex flex-wrap items-stretch pb-4">
                                                <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Nombres</span>
                                                <input wire:model="nombres" type="text" class="relative flex-auto block min-w-0 w-[1px] bg-white rounded-r-lg pl-2 border text-base font-semibold outline-0 border-slate-200" onkeyup="this.value = this.value.toUpperCase();"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12"> {{-- campo Nombre y Apellido --}}
                                            <div class="relative flex flex-wrap items-stretch pb-4">
                                                <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Apellidos</span>
                                                <input wire:model="apellidos" type="text" class="relative flex-auto block min-w-0 w-[1px] bg-white rounded-r-lg pl-2 border text-base font-semibold outline-0 border-slate-200" onkeyup="this.value = this.value.toUpperCase();"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Telefono</span>
                                                        <input wire:model="telefono" type="text" class="w-full rounded-r-lg bg-white pl-2 border text-base font-semibold outline-0 border-slate-200" minlength="15" placeholder="(0000) 000-0000" onkeypress="$(this).mask('(0000) 000-0000')" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="relative flex flex-wrap items-stretch pb-4">
                                                <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Correo</span>
                                                <input wire:model="email" type="email" class="relative flex-auto block min-w-0 w-[1px] bg-white rounded-r-lg pl-2 border text-base font-semibold outline-0 border-slate-200" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12">
                                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Dirección</span>
                                                        <input wire:model="direccion" type="text" class="w-full rounded-r-lg bg-white pl-2 border text-base font-semibold outline-0 border-slate-200" onkeyup="this.value = this.value.toUpperCase();"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                                            <div class="relative flex flex-wrap items-stretch pb-4">
                                                <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Genero</span>
                                                <select wire:model="genero" class="relative m-0 -ml-px block min-w-0 flex-auto border border-solid outline-2 rounded-r-lg bg-clip-padding px-3 py-[0.25rem] font-bold">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Masculino</option>
                                                    <option value="2">Femenina</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Fecha</span>
                                                        <input wire:model="fecha" type="date" class="w-full rounded-r-lg bg-white pl-2 border text-base font-semibold outline-0 border-slate-200"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12">
                                            <div class="relative flex flex-wrap items-stretch pb-4">
                                                <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Edad</span>
                                                <input wire:model="edad" type="number" class="relative flex-auto block min-w-0 w-[1px] bg-white rounded-r-lg pl-2 border text-base font-semibold outline-0 border-slate-200" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                            <div class="flex items-center justify-center pb-4"> {{-- campo Telefono --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <span class="bg-cyan-300 p-2 rounded-tl-lg rounded-bl-lg text-white font-semibold hover:bg-cyan-500 transition-colors">Profesión</span>
                                                        <input wire:model="profesion" type="text" class="w-full rounded-r-lg bg-white pl-2 border text-base font-semibold outline-0 border-slate-200" onkeyup="this.value = this.value.toUpperCase();"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- @error('nombres')
                                    {{$message}}
                                @enderror <br>
                                @error('apellidos')
                                    {{$message}}
                                @enderror<br>
                                @error('telefono')
                                    {{$message}}
                                @enderror --}}
                                
                                <table class="align-items-center mb-0 w-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-gray-700 font-bold text-xs font-weight-bolder opacity-7">#</th>
                                            <th class="text-center text-uppercase text-gray-700 font-bold text-xs font-weight-bolder opacity-7">Cedula</th>
                                            <th class="text-center text-uppercase text-gray-700 font-bold text-xs font-weight-bolder opacity-7">nombre</th>
                                            <th class="text-center text-uppercase text-gray-700 font-bold text-xs font-weight-bolder opacity-7">apellido</th>
                                            <th class="text-center text-uppercase text-gray-700 font-bold text-xs font-weight-bolder opacity-7">telefono</th>
                                            <th class="text-center text-uppercase text-gray-700 font-bold text-xs font-weight-bolder opacity-7">acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $indice =0; ?>
                                        @foreach ($promotores as $promotor)
                                        <?php $indice += 1; ?>
                                        <tr class="border"><td class="ps-4"><p class="text-xs font-weight-bold mb-0"><?php echo $indice; ?></p></td>
                                            <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0">{{$promotor->cedula}}</p></td>
                                            <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{$promotor->nombres}}</td>
                                            <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{$promotor->apellidos}}</td>
                                            <td class="text-center text-uppercase"><p class="text-xs font-weight-bold mb-0"></p>{{$promotor->telefono}}</td>
                                            {{-- @if (auth()->user()->nivel_id == 1) --}}
                                                <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Promotor">
                                                    {{-- <a href="#" wire:click="editarIntegrante('{{$integrante->id}}')" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a> --}}
                                                    <a href="#" wire:click="borrarPromotor('{{$promotor->id}}')" class=" text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_remove</span></a>
                                                </td>
                                            {{-- @endif --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click="cerrarModal()">SALIR</button>
                            </span>
                            {{-- <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="guardar()"  >GUARDAR</button>
                            </span> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>