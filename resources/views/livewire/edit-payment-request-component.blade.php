<div>
    <form wire:submit.prevent="updatePaymentRequest">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-4 gap-6">
                    <div class="sm:col-span-6">
                        <x-form-select name="mode_of_payment" wire:model="mode_of_payment">
                           {{-- <option value="cash" {{ old('mode_of_payment')=='cash' ? 'selected' : 'Select one' }}>cash</option> --}}
                           <option value="bank" {{ old('mode_of_payment')=='bank' ? 'selected' : 'Select one' }}>bank</option>
                           <option value="cheque" {{ old('mode_of_payment')=='cheque' ? 'selected' : 'Select one' }}>cheque</option>
                           <option value="e-wallet" {{ old('mode_of_payment')=='e-wallet' ? 'selected' : 'Select one' }}>e-wallet</option>
                        </x-form-select>
                    </div>

                    @error('mode_of_payment')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    
    
                   <div class="col-span-6">
                    
                        <label class="block text-sm font-medium text-gray-700"> You may upload the proof of payment
                            here.
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                    
                                <div class="text-sm text-gray-600">
                                    <label for="proof_of_payment"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span wire:loading.remove>Upload a file</span>
                                        <span disabled wire:loading>Loading...</span>
                                        <input form="edit-form" name="proof_of_payment" id="proof_of_payment" type="file" class="sr-only"
                                            wire:model="proof_of_payment">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @error('proof_of_payment')

                                @else

                                    {{-- @if($payment_request->proof_of_payment)
                                    <span class="text-blue-500 text-xs mt-2">
                                        <a target="_blank" href="{{ asset('/storage/'.$payment_request->proof_of_payment) }}">View the
                                            attachment.</a></span>
                                    @endif --}}
                                    @if($proof_of_payment)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment()">Remove the
                                            attachment</a></span>
                                    or
                                
                                    <span class="text-blue-500 text-xs mt-2">
                                            <a target="_blank" href="{{ asset('/storage/'.$proof_of_payment) }}">View the
                                                attachment.</a></span>
                                      
                                    @endif
                                @enderror
                            </div>
                    
                    
                        </div>
                        @error('proof_of_payment')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                            @if ($proof_of_payment)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i></p>
                        
                            @endif
                        @enderror
                    </div>
                 <div class="col-span-6 text-right">
                    <button type="submit" wire:loading.remove
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Confirm
                        Payment</button>

                        <button type="button" disabled wire:loading
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Loading...</button>
                </div>
            </div>
        </div>
    </form>
</div>
