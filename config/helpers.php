<?php
function getSlug()
{
  // Get the full URL
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  // Parse URL into parts
  $parsedUrl = parse_url($url);

  // Get the pathname
  $pathname = $parsedUrl['path'];

  // Separate pathname into segments
  $pathSegments = explode('/', trim($pathname, '/'));

  // Return the last segment as the slug
  return end($pathSegments);
}

function getTitle()
{
  $pathname = getSlug();

  $segments =  explode('.', trim($pathname));

  $lastSegment = $segments[0];

  $title = pathinfo($lastSegment, PATHINFO_FILENAME);

  if ($title == "index") {
    $title = "Accueil";
  } elseif ($title == "liste_campings_trois_etoiles_et_plus" || $title == "liste_campings_par_experience" || $title == "fiche_camping" || $title == "liste_campings") {
    $title = "NOS CAMPINGS";
  }

  return $title;
}


function formatDate($datetime)
{
  $date = new DateTime($datetime);
  return $date->format('Y-m-d'); // Format to 'YYYY-MM-DD'
}
