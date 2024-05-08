<div>
    <div class="mb-4">
        @can('create', App\Models\Diagnose::class)
        <button class="btn btn-primary" wire:click="newDiagnose">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Diagnose::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="patient-diagnoses-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                        required
                            name="diagnose.eye"
                            label="Eye"
                            wire:model="diagnose.eye"
                        >
                            <option value="Left" {{ $selected == 'Left' ? 'selected' : '' }} >Left</option>
                            <option value="Right" {{ $selected == 'Right' ? 'selected' : '' }} >Right</option>
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.BCVA"
                            label="BCVA"
                            wire:model="diagnose.BCVA"
                            maxlength="255"
                            placeholder="BCVA"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.IOP"
                            label="I.O.P"
                            wire:model="diagnose.IOP"
                            maxlength="255"
                            placeholder="I.O.P"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.LID"
                            label="LID"
                            wire:model="diagnose.LID"
                            maxlength="255"
                            placeholder="LID"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.conjunctiva"
                            label="CONJUNCTIVA"
                            wire:model="diagnose.conjunctiva"
                            maxlength="255"
                            placeholder="CONJUNCTIVA"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.cornea"
                            label="CORNEA"
                            wire:model="diagnose.cornea"
                            maxlength="255"
                            placeholder="CORNEA"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.AC"
                            label="A/C"
                            wire:model="diagnose.AC"
                            maxlength="255"
                            placeholder="A/C"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.IrisPupil"
                            label="IRIS & PUPIL"
                            wire:model="diagnose.IrisPupil"
                            maxlength="255"
                            placeholder="IRIS & PUPIL"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.lens"
                            label="LENS"
                            wire:model="diagnose.lens"
                            maxlength="255"
                            placeholder="LENS"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="diagnose.fundus"
                            label="FUNDUS"
                            wire:model="diagnose.fundus"
                            maxlength="255"
                            placeholder="FUNDUS"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="diagnose.remarks"
                            label="REMARKS"
                            wire:model="diagnose.remarks"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="diagnose.diagnosis"
                            label="DIAGNOSIS"
                            wire:model="diagnose.diagnosis"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.partials.label
                            name="diagnoseOct"
                            label="OCT"
                        ></x-inputs.partials.label
                        ><br />

                        <input
                            type="file"
                            name="diagnoseOct"
                            id="diagnoseOct{{ $uploadIteration }}"
                            wire:model="diagnoseOct"
                            class="form-control-file"
                        />

                        @if($editing && $diagnose->OCT)
                        <div class="mt-2">
                            <a
                                href="{{ \Storage::url($diagnose->OCT) }}"
                                target="_blank"
                                ><i class="icon ion-md-download"></i
                                >&nbsp;Download</a
                            >
                        </div>
                        @endif @error('diagnoseOct')
                        @include('components.inputs.partials.error') @enderror
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.partials.label
                            name="diagnoseUs"
                            label="U/S"
                        ></x-inputs.partials.label
                        ><br />

                        <input
                            type="file"
                            name="diagnoseUs"
                            id="diagnoseUs{{ $uploadIteration }}"
                            wire:model="diagnoseUs"
                            class="form-control-file"
                        />

                        @if($editing && $diagnose->US)
                        <div class="mt-2">
                            <a
                                href="{{ \Storage::url($diagnose->US) }}"
                                target="_blank"
                                ><i class="icon ion-md-download"></i
                                >&nbsp;Download</a
                            >
                        </div>
                        @endif @error('diagnoseUs')
                        @include('components.inputs.partials.error') @enderror
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.partials.label
                            name="diagnosePantacam"
                            label="PANTACAM"
                        ></x-inputs.partials.label
                        ><br />

                        <input
                            type="file"
                            name="diagnosePantacam"
                            id="diagnosePantacam{{ $uploadIteration }}"
                            wire:model="diagnosePantacam"
                            class="form-control-file"
                        />

                        @if($editing && $diagnose->pantacam)
                        <div class="mt-2">
                            <a
                                href="{{ \Storage::url($diagnose->pantacam) }}"
                                target="_blank"
                                ><i class="icon ion-md-download"></i
                                >&nbsp;Download</a
                            >
                        </div>
                        @endif @error('diagnosePantacam')
                        @include('components.inputs.partials.error') @enderror
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.eye')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.BCVA')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.IOP')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.LID')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.conjunctiva')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.cornea')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.AC')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.IrisPupil')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.lens')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.fundus')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.remarks')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.diagnosis')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.OCT')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.US')
                    </th>
                    <th class="text-left">
                        @lang('crud.patient_diagnoses.inputs.pantacam')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($diagnoses as $diagnose)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $diagnose->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $diagnose->eye ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->BCVA ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->IOP ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->LID ?? '-' }}</td>
                    <td class="text-left">
                        {{ $diagnose->conjunctiva ?? '-' }}
                    </td>
                    <td class="text-left">{{ $diagnose->cornea ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->AC ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->IrisPupil ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->lens ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->fundus ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->remarks ?? '-' }}</td>
                    <td class="text-left">{{ $diagnose->diagnosis ?? '-' }}</td>
                    <td class="text-left">
                        @if($diagnose->OCT)
                        <a
                            href="{{ \Storage::url($diagnose->OCT) }}"
                            target="blank"
                            ><i class="icon ion-md-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td class="text-left">
                        @if($diagnose->US)
                        <a
                            href="{{ \Storage::url($diagnose->US) }}"
                            target="blank"
                            ><i class="icon ion-md-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td class="text-left">
                        @if($diagnose->pantacam)
                        <a
                            href="{{ \Storage::url($diagnose->pantacam) }}"
                            target="blank"
                            ><i class="icon ion-md-download"></i
                            >&nbsp;Download</a
                        >
                        @else - @endif
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $diagnose)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editDiagnose({{ $diagnose->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="16">{{ $diagnoses->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
