
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Calendar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css'><link rel="stylesheet" href="./style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>

<div class="grid grid-cols-2">
<div class="cols-span-1">
<h1 class="mt-5 ml-20 font-bold text-3xl">Calendar</h1>
</div>
<div class="cols-span-1">
	<div class="mr-20 mt-5 flex justify-end items-center">
        <button onclick="showDropdownOptions()" class="flex flex-row justify-between w-48 px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-purple-600">
            <span class="select-none">Month</span>

            <svg id="arrow-down" class="hidden w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
            <svg id="arrow-up" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
        </button>

		<button onclick="showDropdownOptions()" class="ml-2 flex flex-row justify-between w-48 px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-purple-600">
            <span class="select-none">Year</span>

            <svg id="arrow-down" class="hidden w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
            <svg id="arrow-up" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
        </button>
        
    </div>
</div>

</div>
	
<!-- partial:index.partial.html -->
<div class="sm:px-5 lg:pt-5 lg:pb-20 lg:px-20 flex flex-col h-screen">
	<div class="shadow overflow-scroll border-b border-gray-200 sm:rounded">
		<table class="w-full">
			<thead class="z-10 divide-y divide-gray-200">
				<tr class="bg-purple-200 divide-x divide-gray-600" x-data>
					<th scope="col" class="w-64 px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider bg-purple-900">
						Units
					</th>
					<th scope="col" class="w-64 px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider bg-purple-800">
						CHECK IN/OUT
					</th>
					<template x-for="n in 31" :key="`th-${n}`">
						<th scope="col" class="w-32 px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider bg-purple-300">
							JAN <span x-text="n"></span>
						</th>
					</template>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200" x-data>
				<template x-for="n in 16" :key="`tr-${n}`">
					<tr class="divide-x divide-gray-200" x-data>
						<th class="px-6 py-4 whitespace-nowrap bg-purple-100 border-r border-gray-200">
							<div class="flex items-center">
								<div class="text-left">
									<a href="unit-calendar"><div class="text-sm font-medium text-gray-900">Unit <span x-text="n"></span></div></a>
								</div>
							</div>
						</th>
						
						<template x-for="m in 1" :key="`td-${n}-${m}`">
						<td class="px-6 py-4 whitespace-nowrap bg-purple-200 border-r border-gray-200">
							<div class="flex items-center">
								<div class="text-left">
									<div class="text-sm font-light  text-gray-900">AM</span></div>
									<div class="text-sm font-light  text-gray-900">PM</div>
								</div>
							</div>
						</td>
							
							
						</template>

						<template x-for="m in 3 " :key="`td-${n}-${m}`">
							<td class="px-6 py-4 whitespace-nowrap text-center">
								<a href="guest-creation"><span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900">
									vacant</span></a>
								<a href="guest-creation"><span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900">
									vacant</span></a>
							</td>
							
						</template>

						<template x-for="m in 1 " :key="`td-${n}-${m}`">
							<td class="px-6 py-4 whitespace-nowrap text-center">
								<span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-900">
									Juan</span>
								<span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-900">
									Maria</span>
							</td>
							
						</template>
						
						<template x-for="m in 1 " :key="`td-${n}-${m}`">
							<td class="px-6 py-4 whitespace-nowrap text-center">
								<span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-900">
									Maria</span>
								<span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-900">
									Maria</span>
							</td>
							
						</template>

						<template x-for="m in 1 " :key="`td-${n}-${m}`">
							<td class="px-6 py-4 whitespace-nowrap text-center">
								<span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-900">
									Maria</span>
								<span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-900">
									Juan</span>
							</td>
							
						</template>

						<template x-for="m in 1 " :key="`td-${n}-${m}`">
							<td class="px-6 py-4 whitespace-nowrap text-center">
								<span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-orange-900">
									Juan</span>
									<a href="guest-creation"><span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900">
									vacant</span></a>
							</td>
							
						</template>

						<template x-for="m in 24 " :key="`td-${n}-${m}`">
							<td class="px-6 py-4 whitespace-nowrap text-center">
									<a href="guest-creation"><span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900">
									vacant</span></a>
									<a href="guest-creation"><span class="mt-1 px-2 block text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900">
									vacant</span></a>
							</td>
							
						</template>

				</template>
			</tbody>
		</table>
	</div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.0/cdn.js'></script>
</body>

<style>
	table {
  font-family: "Inter", sans-serif;
}
table thead {
  top: 0;
  position: sticky;
}
table thead th:first-child {
  position: sticky;
  left: 0;
}
table tbody tr,
table thead tr {
  position: relative;
}
table tbody th {
  position: sticky;
  left: 0;
}
</style>
</html>

