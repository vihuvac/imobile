<?php

namespace iMobile\Bundle\DataBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Symfony\Component\DependencyInjection\ContainerInterface;
 
use Knp\Menu\ItemInterface as MenuItemInterface;
 
use iMobile\Bundle\DataBundle\Entity\Post;
 
class PostAdmin extends Admin
{
	/**
     * Create and Edit
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('content')
            
            ->with('Medias')
                ->add('picture', 'sonata_type_model_list', array('required' => true), array(
                    'link_parameters' => array(
                        'context' => 'default',
                        'provider'=>'sonata.media.provider.image'
                )))
                ->add('file', 'sonata_type_model_list', array('required' => false), array(
                    'link_parameters' => array(
                        'context' => 'default',
                        'provider'=>'sonata.media.provider.file'
                )))
            ->end()
            
            ->with('Similar Posts')
                ->add('similarPost', null, array('required' => false, 'label' => 'Posts'))
            ->end()

            ->with('Just for authorized users:')
                ->add('published', null, array('required' => false))
            ->end()

            ->setHelps(array(
                'content' => 'Make a post dude!',
                'similarPost' => 'Shift+Click for multiple selection'
            ))
            ->end()
        ;
    }

    /**
     * List
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('published', null, array('editable' => true, 'template' => 'DataBundle:Post:published.html.twig'))
            ->addIdentifier('title')
            ->add('author', null, array('label' => 'Author'))
            ->add('creationDate', null, array('label' => 'Created on'))
            ->add('modificationDate', null, array('label' => 'Updated on'))
            ->add('picture', null, array('label' => 'Featured image', 'template' => 'DataBundle:Post:featuredimage.html.twig'))
            ->add(
            	'_action', 'actions', array(
	                'actions' => array(
	                    'view' => array(),
	                    'edit' => array(),
	                    'delete' => array(),
	                )
            	)
            )
        ;
    }

    /**
     * Filters
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('published')
            ->add('title')
            ->add('author')
            ->add('creationDate')
            ->add('modificationDate')
        ;
    }

     /**
     * Show
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->with('Post')
                ->add('title')
                ->add('content')
                ->add('author', null, array('label' => 'By:'))
                ->add('creationDate')
                ->add('modificationDate')
                ->add('published')
            ->end()
            
            ->with('Medias')
                ->add('picture', null, array('template' => 'DataBundle:Post:featuredimage.html.twig'))
                ->add('file')
            ->end()
            
            ->with('Similar Post')
                ->add('similarPost')
            ->end()
        ;
    }
}