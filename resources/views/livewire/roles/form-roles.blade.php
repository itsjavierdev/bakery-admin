<div>
    <x-button.blue wire:click="$set('open', true)">
        Crear
    </x-button.blue>
    <div>
        <!--MODAL CREATE UPDATE-->
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                {{ $formtitle }}
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label value="Roles" />
                    <x-input type="text" class="w-full"
                        wire:model.blur="{{ $editform ? 'rolEdit.name' : 'rolCreate.name' }}" />
                    <x-input-error for="{{ $editform ? 'rolEdit.name' : 'rolCreate.name' }}" />

                </div>
                <div class="mb-4">
                    <x-label value="Permisos" />
                    <ul>
                        @foreach ($permissions as $permission)
                            <li>
                                <label>
                                    <x-checkbox name="roles"
                                        wire:model.blur="{{ $editform ? 'rolEdit.selectedPermissions' : 'rolCreate.selectedPermissions' }}"
                                        value="{{ $permission->id }}" />
                                    {{ $permission->description }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <x-input-error
                        for="{{ $editform ? 'rolEdit.selectedPermissions' : 'rolCreate.selectedPermissions' }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex flex-row-reverse justify-between w-full">

                    @if ($editform)
                        <x-danger-button wire:click="update" type="button">
                            Actualizar
                        </x-danger-button>
                    @else
                        <x-danger-button wire:click="save">
                            Crear
                        </x-danger-button>
                    @endif
                    <x-secondary-button wire:click="$set('open', false)">
                        Cancelar
                    </x-secondary-button>
                </div>

            </x-slot>
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
