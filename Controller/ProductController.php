<?php

namespace Loevgaard\DandomainFoundationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Loevgaard\DandomainFoundationBundle\Model\ProductInterface;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{
    /**
     * Lists all product entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $paginator = $this->get('knp_paginator');

        $query = $em->getRepository($this->getParameter('loevgaard_dandomain_foundation.product_class'))->findAll();

        $products = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 50)
        );

        return $this->render('LoevgaardDandomainFoundationBundle:product:index.html.twig', array(
            'products' => $products,
        ));
    }

    /**
     * Creates a new product entity.
     *
     */
    public function newAction(Request $request)
    {
        $productClass = $this->getParameter('loevgaard_dandomain_foundation.product_class');
        $product = new $productClass();
        $form = $this->createForm($this->getParameter('loevgaard_dandomain_foundation.product_type_form_class'), $product, ['data_class' => $productClass]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('admin_product_show', array('id' => $product->getId()));
        }

        return $this->render('LoevgaardDandomainFoundationBundle:product:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository($this->getParameter('loevgaard_dandomain_foundation.product_class'))->findOneById($id);

        if (null === $product) {
            throw $this->createNotFoundException();
        }

        $deleteForm = $this->createDeleteForm($product);

        return $this->render('LoevgaardDandomainFoundationBundle:product:show.html.twig', array(
            'product' => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing product entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $productClass = $this->getParameter('loevgaard_dandomain_foundation.product_class');
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository($productClass)->findOneById($id);

        if (null === $product) {
            throw $this->createNotFoundException();
        }

        $deleteForm = $this->createDeleteForm($product);
        $editForm = $this->createForm($this->getParameter('loevgaard_dandomain_foundation.product_type_form_class'), $product, ['data_class' => $productClass]);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_product_edit', array('id' => $product->getId()));
        }

        return $this->render('LoevgaardDandomainFoundationBundle:product:edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a product entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository($this->getParameter('loevgaard_dandomain_foundation.product_class'))->findOneById($id);

        if (null === $product) {
            throw $this->createNotFoundException();
        }

        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('admin_product_index');
    }

    /**
     * Creates a form to delete a product entity.
     *
     * @param Product $product The product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductInterface $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_product_delete', array('id' => $product->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
