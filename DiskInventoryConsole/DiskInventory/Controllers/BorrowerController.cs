using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using DiskInventory.Models;
using Microsoft.EntityFrameworkCore;

/*
    Original Author: Luke Chulack                         
    Date Created:  11/12/2021                                     
    Version: 3.0                                           
    Date Last Modified: 12/10/2021                               
    Modified by: Luke Chulack                                          
    Modification log: 

           version 1.0 -  11/12/2021  - Built the Borrower Controller which links to the view in the Borrower view folder
           version 2.0 -  11/19/2021  - added logic foradd, edit and delete of Borrowers data.
           version 3.0 -  12/10/2021  - changed all add, edit, and delete elements to use sql stored procedures, also send data to view regarding success on action;


 */


namespace DiskInventory.Controllers
{
    public class BorrowerController : Controller
    {
        private disk_inventorylcContext context { get; set; }

        public BorrowerController(disk_inventorylcContext ctx)
        {
            context = ctx;

        }
        public IActionResult Index()
        {
            // Sql ( using Linq ) query to get/order data related to the borrower table

            List<Borrower> borrowers = context.Borrowers.OrderBy(b => b.Lname).ThenBy(b => b.Fname).ToList();
            return View(borrowers);
        }

        [HttpGet]
        public IActionResult Add()
        {
            ViewBag.Action = "Add";
            return View("Edit", new Borrower());
        }


        [HttpGet]
        public IActionResult Edit(int id) // overloaded edit to get Borrower id
        {
            ViewBag.Action = "Edit";
            var borrower = context.Borrowers.Find(id);
            return View(borrower);
        }


        [HttpPost]
        public IActionResult Edit(Borrower borrower)
        {
            if (ModelState.IsValid)
            {
                if (borrower.BorrowerId == 0) // add Borrower
                {
                    // context.Borrowers.Add(borrower);
                    context.Database.ExecuteSqlRaw("execute sp_ins_borrower @p0, @p1, @p2", parameters: new[] { borrower.Fname, borrower.Lname, borrower.BorrowerPhoneNum.ToString() });
                    TempData["actionMessage"] = "added";

                }
                else // update Borrower
                {
                    //    context.Borrowers.Update(borrower);
                    context.Database.ExecuteSqlRaw("execute sp_upd_borrower @p0, @p1, @p2, @p3", parameters: new[] { borrower.BorrowerId.ToString(), borrower.Fname, borrower.Lname, borrower.BorrowerPhoneNum.ToString() });
                    TempData["actionMessage"] = "updated";



                }
                //  context.SaveChanges();
                return RedirectToAction("Index", "Borrower");

            }
            else
            {
                ViewBag.Action = (borrower.BorrowerId == 0) ? "Add" : "Edit";
                return View(borrower);
            }

        }




        [HttpGet]
        public IActionResult Delete(int id) // gets id to delete
        {
            var borrower = context.Borrowers.Find(id);
            return View(borrower);
        }

        [HttpPost]

        public IActionResult Delete(Borrower borrower) // overload delete
        {
            //   context.Borrowers.Remove(borrower);
            //    context.SaveChanges();
            context.Database.ExecuteSqlRaw("execute sp_del_borrower @p0", parameters: new[] { borrower.BorrowerId.ToString() });
            TempData["actionMessage"] = "delete";

            return RedirectToAction("Index", "Borrower");
        }


    }
}
