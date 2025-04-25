<section>
    <form wire:submit="updatePost" class="max-w-md mx-auto flex flex-col gap-6 bg-slate-400 shadow-2xl rounded-2xl p-4">
        <!-- Title -->
        <flux:input
            wire:model="form.title"
            label="Title"
            type="text"
            autofocus
            autocomplete="email"
            placeholder="Title"
        />

        <!-- Image -->
        <flux:input
            wire:model="form.image"
            label="Image"
            type="file"
        />

        <div class="flex gap-2">
            <img src="{{ asset($form->post->image)}}"
            @class([
                'w-12 h-12 rounded-2xl',
                'opacity-30'=> $form->image
                ])>
            @if ($form->image)
                <img src="{{ $form->image->temporaryUrl() }}" class="w-12 h-12 rounded-2xl">
            @endif
        </div>

        <!-- Content -->
        <flux:textarea
            wire:model="form.content"
            label="Content"
            placeholder="Content"
        />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">Update</flux:button>
        </div>
    </form>
</section>

