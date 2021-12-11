using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using DiskInventory.Models;
using Microsoft.EntityFrameworkCore;

/*
    Original Author: Luke Chulack                         
    Date Created:  11/19/2021                                     
    Version: 2.0                                           
    Date Last Modified: 12/10/2021                               
    Modified by: Luke Chulack                                          
    Modification log: 

           version 1.0 -  11/12/2021  - Built the Artist Controller which links to the view in the Artist view folder
           version 2.0 -  11/19/2021  - Added the logic for the add, edit and delete buttons in the artist view;
           version 3.0 -  12/10/2021  - changed all add, edit, and delete elements to use sql stored procedures, also send data to view regarding success on action;
 
 */

namespace DiskInventory.Controllers
{
    public class ArtistController : Controller
    {

        private disk_inventorylcContext context { get; set; }

        public ArtistController(disk_inventorylcContext ctx)
        {
            context = ctx;

        }
        public IActionResult Index()
        {
            // Sql ( using Linq ) query to get/order data related to the artist table
            List<Artist> artists = context.Artists.OrderBy(a => a.ArtistLname).ThenBy(a => a.ArtistFname).ToList();
            return View(artists);
        }

        [HttpGet]
        public IActionResult Add()
        {
            ViewBag.Action = "Add";
            ViewBag.ArtistTypes = context.ArtistTypes.OrderBy(t => t.Description).ToList();
            return View("Edit", new Artist());
        }
        [HttpGet]
        public IActionResult Edit(int id) // overloaded edit to get artist id
        {
            ViewBag.Action = "Edit";
            ViewBag.ArtistTypes = context.ArtistTypes.OrderBy(t => t.Description).ToList();
            var artist = context.Artists.Find(id);
            return View(artist);
        }

        [HttpPost]
        public IActionResult Edit(Artist artist)
        {
            if (ModelState.IsValid)
            {
                if (artist.ArtistId == 0) // add artist
                {
                   // context.Artists.Add(artist);
                  context.Database.ExecuteSqlRaw("execute sp_ins_artist @p0, @p1, @p2", parameters: new[] { artist.ArtistFname, artist.ArtistLname, artist.ArtistTypeId.ToString() } );
                    TempData["actionMessage"] = "added";
                } else // update artist
                {
                    //context.Artists.Update(artist);
                    // context.Database.ExecuteSqlRaw("execute sp_upd_artist @p0, @p1, @p2, @p3", parameters: new[] { artist.ArtistFname, artist.ArtistLname, artist.ArtistTypeId.ToString(), artist.ArtistId });
                    context.Database.ExecuteSqlRaw("execute sp_upd_artist @p0, @p1, @p2", parameters: new[] { artist.ArtistFname, artist.ArtistLname, artist.ArtistId.ToString() });
                    TempData["actionMessage"] = "updated";
                }

                // context.SaveChanges();
                return RedirectToAction("Index", "Artist");

            } else
            {
                ViewBag.Action = (artist.ArtistId == 0) ? "Add" : "Edit";
                ViewBag.ArtistTypes = context.ArtistTypes.OrderBy(t => t.Description).ToList();
                return View(artist);
            }

        }
        [HttpGet]
        public IActionResult Delete(int id) // gets id to delete
        {
            var artist = context.Artists.Find(id);
            return View(artist);
        }

        [HttpPost]

        public IActionResult Delete(Artist artist) // overload delete
        {
            //context.Artists.Remove(artist);
            //context.SaveChanges();

            context.Database.ExecuteSqlRaw("execute sp_del_artist @p0", parameters: new[] { artist.ArtistId.ToString() });
            TempData["actionMessage"] = "delete";

            return RedirectToAction("Index", "Artist");
        }

    }


}
