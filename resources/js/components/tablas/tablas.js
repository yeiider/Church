import React, { Component } from 'react'


const Table=({data})=>(
    <div>
       <table className="table table-hover" id="myTable">
           <thead>
               <tr>
               {data.head.map((d)=>(
                <th key={d.length}>
                    {d}
                </th>
                ))}
               </tr>

           </thead>
           <tbody>
             {data.body.map((d)=>(
             <tr key={d.id}>
               {data.body.contents.map((c)=>(
                   <td key={c.length}>c</td>
               ))}
             </tr>
             ))}
           </tbody>
       </table>
    </div>
)

export default Table
