<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div class= 'space-y-4'>
        @foreach($jobs as $job)
        <a href="/jobs/{{$job['id']}}" class='block border border-gray-200 px-4 py-4 rounded-lg'>
            <div class='text-blue-500 text-sm font-bold'>
                {{ $job->employer->name }}
            </div>
            <div>
                <strong class="text-laracasts">{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
            </div>
        </a>
        @endforeach
    </div>
    <div>
        {{ $jobs->links() }}
    </div>
</x-layout>

