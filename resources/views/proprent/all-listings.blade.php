@include('includes.proprent-head')


<div class="min-h-screen ">

	<div class="py-16">
		<div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">


			<div class=" flex items-center justify-between pb-6">
				<div>
					<h2 class="text-gray-600 font-semibold">All Listings</h2>
				</div>
				<div class="flex items-center justify-between">
					<div class="flex bg-gray-50 items-center p-2 rounded-md">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
							fill="currentColor">
							<path fill-rule="evenodd"
								d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
								clip-rule="evenodd" />
						</svg>
						<input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id=""
							placeholder="search...">
					</div>
					<div class="lg:ml-40 ml-10 space-x-8">
						<button onClick="location.href='/proprent/upload-listing'"
							class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Create New
							Listing</button>
					</div>
				</div>
			</div>
			<div>
				<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-auto">
					<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
						<table class="min-w-full leading-normal">
							<thead>
								<tr>
									<th
										class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
										Name
									</th>
									<th
										class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
										Type
									</th>
									<th
										class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
										Location
									</th>
									<th
										class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
										Price
									</th>
									<th
										class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
										Status
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<div class="flex items-center">
											<div class="ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
													ABC Dorm Unit 1
												</p>
											</div>
										</div>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">Dorm</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">

											Location
										</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">
											43
										</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<span
											class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
											<span aria-hidden
												class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
											<span class="relative"></span>
										</span>
									</td>
								</tr>
								<tr>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<div class="flex items-center">

											<div class="ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
													ABC Dorm Unit 1
												</p>
											</div>
										</div>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">Apartment</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">

											Location
										</p>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">
											77
										</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<span
											class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
											<span aria-hidden
												class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
											<span class="relative"></span>
										</span>
									</td>
								</tr>
								<tr>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<div class="flex items-center">

											<div class="ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
													ABC Dorm Unit 1
												</p>
											</div>
										</div>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">Apartment</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">

											Location
										</p>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">
											64
										</p>
									</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
										<span
											class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
											<span aria-hidden
												class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
											<span class="relative"></span>
										</span>
									</td>
								</tr>
								<tr>
									<td class="px-5 py-5 bg-white text-sm">
										<div class="flex items-center">

											<div class="ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
													ABC Dorm Unit 1
												</p>
											</div>
										</div>
									</td>
									<td class="px-5 py-5 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">Dorm</p>
									</td>
									<td class="px-5 py-5 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">Location</p>
									</td>
									<td class="px-5 py-5 bg-white text-sm">
										<p class="text-gray-900 whitespace-no-wrap">70</p>
									</td>
									<td class="px-5 py-5 bg-white text-sm">
										<span
											class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
											<span aria-hidden
												class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
											<span class="relative"></span>
										</span>
									</td>
								</tr>
							</tbody>
						</table>
						<div
							class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
							<span class="text-xs xs:text-sm text-gray-900">
								Showing 1 to 4 of 50 Entries
							</span>
							<div class="inline-flex mt-2 xs:mt-0">
								<x-button>
									Prev
								</x-button>

								<x-button type="submit">
									Next
								</x-button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>


	</main>





</div>
</div>

</body>



</html>