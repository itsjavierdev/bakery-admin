<div>
    <x-button.blue wire:click="$set('open', true)">
        Crear
    </x-button.blue>
    <div>
        <!--MODAL CREATE-UPDATE-->
        <x-dialog-modal wire:model="open">
            <form wire:submit="save" enctype="multipart/form-data">
                <!--TITLE-->
                <x-slot name="title">
                    Crear nuevo producto
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4 gap-5 flex flex-col gap-5">
                        <!--MODAL CREATE-->
                        <div>
                            <x-label value="Producto" />
                            <x-input type="text" class="w-full"
                                wire:model.blur="{{ $editform ? 'productEdit.name' : 'productCreate.name' }}" />
                            <x-input-error for="{{ $editform ? 'productEdit.name' : 'productCreate.name' }}" />

                        </div>
                        <div>
                            <x-label value="Categoría" />
                            <select
                                wire:model.blur="{{ $editform ? 'productEdit.category_id' : 'productCreate.category_id' }}"
                                class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error
                                for="{{ $editform ? 'productEdit.category_id' : 'productCreate.category_id' }}" />
                        </div>
                        <div>
                            <x-label value="Precio" />
                            <x-input type="text" class="w-full"
                                wire:model.blur="{{ $editform ? 'productEdit.price' : 'productCreate.price' }}" />
                            <x-input-error for="{{ $editform ? 'productEdit.price' : 'productCreate.price' }}" />
                        </div>
                        <div>
                            <x-label value="Descripción" />
                            <x-input type="text" class="w-full"
                                wire:model.blur="{{ $editform ? 'productEdit.description' : 'productCreate.description' }}" />
                            <x-input-error
                                for="{{ $editform ? 'productEdit.description' : 'productCreate.description' }}" />
                        </div>
                        <div>
                            <x-label value="Imagen" />
                            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <input type="file" class="w-full"
                                    wire:model.blur="{{ $editform ? 'productEdit.newFeatured' : 'productCreate.newFeatured' }}"
                                    wire:key="productCreate.imageKey" />
                                <div class="pt-2" x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <x-input-error for="productCreate.newFeatured" />
                            <div>
                                <div class="flex gap-6">
                                    @if ($editform == false && $productCreate->newFeatured)
                                        <img src="{{ $productCreate->newFeatured->temporaryUrl() }}" alt=""
                                            width="100px" class="pt-2">
                                    @endif
                                    @if ($editform == true && $productEdit->oldFeatured)
                                        <div>
                                            <span>Imagen actual:</span>
                                            <img src="{{ asset('storage/' . $productEdit->oldFeatured) }}"
                                                alt="" width="100px" class="pt-2">
                                        </div>
                                    @endif
                                    @if ($editform == true && $productEdit->newFeatured)
                                        <div>
                                            <span>Nueva Imagen:</span>
                                            <img src="{{ $productEdit->newFeatured->temporaryUrl() }}" alt=""
                                                width="100px" class="pt-2">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot>
                <!--ACCIONES-->
                <x-slot name="footer">
                    <div class="flex flex-row-reverse justify-between w-full">
                        <!--CONDITIONAL CREATE-UPDATE-->
                        @if ($editform)
                            <x-danger-button wire:click="update" type="button">
                                Actualizar
                            </x-danger-button>
                        @else
                            <x-danger-button wire:click="save" wire:loading.attr="disabled"
                                wire:target="save, productCreate.featured, productEdit.featured"
                                class="disabled:opacity-25">
                                Crear
                            </x-danger-button>
                        @endif
                        <x-secondary-button wire:click="$set('open', false)">
                            Cancelar
                        </x-secondary-button>
                    </div>

                </x-slot>
            </form>
        </x-dialog-modal>
        <!--TOAST-->
        <x-action-message on="saved">
            @if (session('status'))
                <x-admin.alert action="{{ session('accion') }}">
                    {{ session('status') }}
                </x-admin.alert>
            @endif
        </x-action-message>


    </div>
</div>
