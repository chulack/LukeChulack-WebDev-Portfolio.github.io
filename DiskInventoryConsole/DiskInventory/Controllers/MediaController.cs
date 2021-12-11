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

           version 1.0 -  11/12/2021  - Built the Media Controller which links to the view in the Media view folder
           version 2.0 -  11/12/2021  - Added the logic for the add, edit and delete buttons in the media view;
           version 3.0 -  12/10/2021  - changed all add, edit, and delete elements to use sql stored procedures, also send data to view regarding success on action;

 */
namespace DiskInventory.Controllers
{
    public class MediaController : Controller
    {
        private disk_inventorylcContext context { get; set; }

        public MediaController(disk_inventorylcContext ctx)
        {
            context = ctx;

        }
        public IActionResult Index()
        {
            // Sql ( using Linq ) query to get/order data related to the Media table

            List<Medium> medium = context.Media.OrderBy(m => m.MediaName).ToList();
            return View(medium);
        }


        [HttpGet]
        public IActionResult Add()
        {
            ViewBag.Action = "Add";
            ViewBag.MediaTypes = context.MediaTypes.OrderBy(t => t.Description).ToList();
            ViewBag.Statuses = context.Statuses.OrderBy(s => s.Description).ToList();
            ViewBag.Genres = context.Genres.OrderBy(g => g.Description).ToList();
            return View("Edit", new Medium());
        }

        [HttpGet]

        public IActionResult Edit(int id)
        {
            ViewBag.Action = "Edit";
            ViewBag.MediaTypes = context.MediaTypes.OrderBy(t => t.Description).ToList();
            ViewBag.Statuses = context.Statuses.OrderBy(s => s.Description).ToList();
            ViewBag.Genres = context.Genres.OrderBy(g => g.Description).ToList();

            var media = context.Media.Find(id);
            return View(media);

        }

        [HttpPost]
        public IActionResult Edit(Medium media)
        {
            if (ModelState.IsValid)
            {
                if (media.MediaId == 0) // add media
                {
                   // context.Media.Add(media);
                    context.Database.ExecuteSqlRaw("execute sp_ins_media @p0, @p1, @p2, @p3, @p4", parameters: new[] { media.MediaName, media.ReleseDate.ToString(), media.GenreId.ToString(), media.StatusId.ToString(), media.MediaTypeId.ToString() });
                    TempData["actionMessage"] = "added";

                }
                else // update media
                {
                    // context.Media.Update(media);
                    context.Database.ExecuteSqlRaw("execute sp_upd_media @p0, @p1, @p2, @p3, @p4, @p5", parameters: new[] { media.MediaName, media.ReleseDate.ToString(), media.GenreId.ToString(), media.StatusId.ToString(), media.MediaTypeId.ToString(), media.MediaId.ToString() });
                    TempData["actionMessage"] = "updated";


                }
                //   context.SaveChanges();
                return RedirectToAction("Index", "Media");

            }
            else
            {
                ViewBag.Action = (media.MediaId == 0) ? "Add" : "Edit";
                ViewBag.MediaTypes = context.MediaTypes.OrderBy(t => t.Description).ToList();
                ViewBag.Statuses = context.Statuses.OrderBy(s => s.Description).ToList();
                ViewBag.Genres = context.Genres.OrderBy(g => g.Description).ToList();
                return View(media);
            }

        }

        [HttpGet]
        public IActionResult Delete(int id) // gets id to delete
        {
            var media = context.Media.Find(id);
            return View(media);
        }

        [HttpPost]

        public IActionResult Delete(Medium media) // overload delete
        {
            //context.Media.Remove(media);
            //context.SaveChanges();
            context.Database.ExecuteSqlRaw("execute sp_del_media @p0", parameters: new[] { media.MediaId.ToString() });
            TempData["actionMessage"] = "updated";

            return RedirectToAction("Index", "Media");
        }

    }
}
