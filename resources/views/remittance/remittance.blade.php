<x-new-layout>

<style>
    * {
    margin: 0px;
    padding: 0;

}


.heading {
    display: flex;



}
h1 { 
    background: transparent;
    padding: 7px;
    
}


.outer-wrapper {
    margin: 10px;
    margin-left: 20px;
    margin-right: 20px;
    max-width: fit-content;
    max-height: fit-content;

    
}
.table-wrapper {

    overflow-y: scroll;
    overflow-x: scroll;
    height: fit-content;
    max-height: 66.4vh;
    margin-top: 22px;
    margin: 15px;
    padding-bottom: 20px;
    
}


table {
    
    min-width: max-content;
    border-collapse: separate;
    border-spacing: 0px;    
    
}



table th{
    position: sticky; 
    top: 0px;
    background-color:#e3e3e3;
    color: #2e2e2e;
    
    text-align: center;
    font-weight: medium;
    font-size: 14px;
    outline: 0.7px solid black;
    border: 1.5px solid black;

} 



table th, table td {
    
    padding: 15px;
    padding-top: 10px;
    padding-bottom: 10px;
    
}

table td {
    text-align: left;
    font-size: 15px;
    border: 1px solid rgb(177, 177, 177);
    padding-left: 20px;
    
}

.first-col {
  width: 100px;
  min-width: 100px;
  max-width: 100px;
  left: 0px;
}

.second-col {
  width: 150px;
  min-width: 150px;
  max-width: 150px;
  left: 100px;
}

.third-col {
  width: 200px;
  min-width: 200px;
  max-width: 200px;
  left: 200px;
}

.fourth-col {
  width: 250px;
  min-width: 250px;
  max-width: 250px;
  left: 300px;
}

.fifth-col {
  width: 300px;
  min-width: 300px;
  max-width: 300px;
  left: 400px;
}

.sixth-col {
  width: 300px;
  min-width: 300px;
  max-width: 300px;
  left: 500px;
}

.sticky-col {
  position: -webkit-sticky;
  position: sticky;
  background-color: white;
}


</style>
<div class="px-4 sm:px-6 lg:px-8 pt-10">
<div class="sm:flex sm:items-center justify-between pb-8">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Remittance Report</h1>  
            </div>
            <div class="flex justify-end">
                <p class="text-sm font-light">Filter by Month:</p>

                            <select id="small" wire:model="filter"
                                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="March">April</option>
                                <option value="March">May</option>
                                <option value="March">June</option>
                                <option value="March">July</option>
                                <option value="March">August</option>
                                <option value="March">September</option>
                                <option value="March">October</option>
                                <option value="March">November</option>
                                <option value="March">December</option>
                            </select>

            </div>
</div>



<div class="pb-16">
<div class="outer-wrapper">
    <div class="table-wrapper">
    <table style="overflow: scroll;">
        <thead>
            <th>Unit #</th>
            <th>Date Paid</th>
            <th>AR #</th>
            <th>Particulars</th>
            <th>Tenant Name</th>
            <th>Owner Name</th>
            <th class="bg-yellow-300">Payee Name</th>  <!-- YELLOW = MANUAL INPUT -->
            <th>Monthly Rent</th> <!-- AUTO COMPUTE -->
            <th>Net Rent </th> <!-- MANAGEMENT FEE + NET RENT -->
            <th>Management Fee</th> <!-- FROM COLLECTION -->
            <th class="bg-yellow-300">Service Charge</th> <!-- YELLOW = MANUAL INPUT -->
            <th class="bg-yellow-300">Purchased Materials Particulars</th>
            <th class="bg-yellow-300">Recharge of Fire Extinguisher</th>
            <th class="bg-yellow-300">Garbage Fee</th>
            <th class="bg-yellow-300">PROP.MOD.&DEVT</th>
            <th class="bg-yellow-300">BUILDING INSURANCE</th>
            <th class="bg-yellow-300">CONDO DUES</th>
            <th class="bg-yellow-300">CONDO DUES REMARKS</th> 
            <th class="bg-yellow-300">REAL PROPERTY TAX - COMMON AREA</th>
            <th>TOTAL DEDUCTIONS</th>
            <th>REMITTANCE</th>
            <th>CV NO.</th> 
            <th>Check No</th>
        </thead>
        <tbody>
            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>

            <tr>
            <td class="sticky-col first-col">Unit 2</td>
            <td class="sticky-col second-col">01-AUG-23</td>
            <td class="sticky-col third-col">12345</td>
            <td class="sticky-col fourth-col">Rent for July</td>
            <td class="sticky-col fifth-col">Juan Dela Cruz</td>
            <td class="sticky-col sixth-col">Chrisostomo Ibarra Jr</td>
                <td><input></input></td>
                <td>Value 7</td>
                <td>Value 8</td>
                <td>Value 9</td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td><input></input></td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
            </tr>


        
           
  
            



     

    </table>
</div>
</div>



</div>
</div>
</div>

</x-new-layout>
